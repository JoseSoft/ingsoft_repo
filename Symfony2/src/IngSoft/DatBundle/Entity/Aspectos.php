<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aspectos
 *
 * @ORM\Table(name="aspectos")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\AspectoRepository")
 */
class Aspectos
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
     * @ORM\Column(name="nombre", type="string", length=30, nullable=false)
     */
    private $nombre;

    /**
     * @var float
     *
     * @ORM\Column(name="calificacion", type="decimal", nullable=false)
     */
    private $calificacion;

    /**
     * @var float
     *
     * @ORM\Column(name="porcentaje_influencia", type="decimal", nullable=false)
     */
    private $porcentajeInfluencia;

    /**
     * @var \PruebasTecnicas
     *
     * @ORM\ManyToOne(targetEntity="PruebasTecnicas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_prueba", referencedColumnName="codigo")
     * })
     */
    private $prueba;


    function __construct($codigo, $nombre, $calificacion, $porcentajeInfluencia,
        \PruebasTecnicas $prueba) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->calificacion = $calificacion;
        $this->porcentajeInfluencia = $porcentajeInfluencia;
        $this->prueba = $prueba;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Aspectos
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
     * Set calificacion
     *
     * @param float $calificacion
     * @return Aspectos
     */
    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;
    
        return $this;
    }

    /**
     * Get calificacion
     *
     * @return float 
     */
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    /**
     * Set porcentajeInfluencia
     *
     * @param float $porcentajeInfluencia
     * @return Aspectos
     */
    public function setPorcentajeInfluencia($porcentajeInfluencia)
    {
        $this->porcentajeInfluencia = $porcentajeInfluencia;
    
        return $this;
    }

    /**
     * Get porcentajeInfluencia
     *
     * @return float 
     */
    public function getPorcentajeInfluencia()
    {
        return $this->porcentajeInfluencia;
    }

    /**
     * Set codigoPrueba
     *
     * @param \IngSoft\DatBundle\Entity\PruebasTecnicas $prueba
     * @return Aspectos
     */
    public function setPrueba(\IngSoft\DatBundle\Entity\PruebasTecnicas $prueba = null)
    {
        $this->prueba = $prueba;
    
        return $this;
    }

    /**
     * Get codigoPrueba
     *
     * @return \IngSoft\DatBundle\Entity\PruebasTecnicas 
     */
    public function getPrueba()
    {
        return $this->prueba;
    }
}