<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Foros
 *
 * @ORM\Table(name="foros")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\ForoRepository")
 */
class Foros
{
    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=false)
     */
    private $descripcion;

    /**
     * @var \Categorias
     *
     * @ORM\ManyToOne(targetEntity="Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_categoria", referencedColumnName="codigo")
     * })
     */
    private $categoria;



    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Foros
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Foros
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set codigoCategoria
     *
     * @param \IngSoft\DatBundle\Entity\Categorias $codigoCategoria
     * @return Foros
     */
    public function setCategoria(\IngSoft\DatBundle\Entity\Categorias $categoria = null)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get codigoCategoria
     *
     * @return \IngSoft\DatBundle\Entity\Categorias 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
}