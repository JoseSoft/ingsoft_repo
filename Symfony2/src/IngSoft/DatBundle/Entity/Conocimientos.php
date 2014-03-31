<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conocimientos
 *
 * @ORM\Table(name="conocimientos")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\ConocimientoRepository")
 */
class Conocimientos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_titulo", type="string", length=60, nullable=true)
     */
    private $nombreTitulo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_obtencion", type="date", nullable=false)
     */
    private $fechaObtencion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Etiquetas", mappedBy="codigoConocimiento")
     */
    private $etiquetas;

    /**
     * @var \TiposConocimientos
     *
     * @ORM\ManyToOne(targetEntity="TiposConocimientos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_tipo", referencedColumnName="codigo")
     * })
     */
    private $tipo;
    
    function __construct($codigo, $nombreTitulo, \DateTime $fechaObtencion, 
            \Doctrine\Common\Collections\Collection $etiquetas, 
            \TiposConocimientos $tipo) {
        $this->codigo = $codigo;
        $this->nombreTitulo = $nombreTitulo;
        $this->fechaObtencion = $fechaObtencion;
        $this->etiquetas = $etiquetas;
        $this->tipo = $tipo;
    }

    /**
     * Get codigo
     *
     * @return integer 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombreTitulo
     *
     * @param string $nombreTitulo
     * @return Conocimientos
     */
    public function setNombreTitulo($nombreTitulo)
    {
        $this->nombreTitulo = $nombreTitulo;
    
        return $this;
    }

    /**
     * Get nombreTitulo
     *
     * @return string 
     */
    public function getNombreTitulo()
    {
        return $this->nombreTitulo;
    }

    /**
     * Set fechaObtencion
     *
     * @param \DateTime $fechaObtencion
     * @return Conocimientos
     */
    public function setFechaObtencion($fechaObtencion)
    {
        $this->fechaObtencion = $fechaObtencion;
    
        return $this;
    }

    /**
     * Get fechaObtencion
     *
     * @return \DateTime 
     */
    public function getFechaObtencion()
    {
        return $this->fechaObtencion;
    }

    /**
     * Add codigoEtiqueta
     *
     * @param \IngSoft\DatBundle\Entity\Etiquetas $etiqueta
     * @return Conocimientos
     */
    public function addEtiqueta(\IngSoft\DatBundle\Entity\Etiquetas $etiqueta)
    {
        $this->etiquetas[] = $etiqueta;
    
        return $this;
    }

    /**
     * Remove codigoEtiqueta
     *
     * @param \IngSoft\DatBundle\Entity\Etiquetas $codigoEtiqueta
     */
    public function removeCodigoEtiqueta(\IngSoft\DatBundle\Entity\Etiquetas $etiqueta)
    {
        $this->etiquetas->removeElement($etiqueta);
    }

    /**
     * Get codigoEtiqueta
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEtiquetas()
    {
        return $this->etiquetas;
    }

    /**
     * Set codigoTipo
     *
     * @param \IngSoft\DatBundle\Entity\TiposConocimientos $tipo
     * @return Conocimientos
     */
    public function setTipo(\IngSoft\DatBundle\Entity\TiposConocimientos $tipo = null)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get codigoTipo
     *
     * @return \IngSoft\DatBundle\Entity\TiposConocimientos 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}