<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Objetivos
 *
 * @ORM\Table(name="objetivos")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\ObjetivoRepository")
 */
class Objetivos
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
     * @var \Proyectos
     *
     * @ORM\ManyToOne(targetEntity="Proyectos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_proyecto", referencedColumnName="codigo")
     * })
     */
    private $proyecto;



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
     * @return Objetivos
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
     * @return Objetivos
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
     * Set calificacion
     *
     * @param float $calificacion
     * @return Objetivos
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
     * @return Objetivos
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
     * Set codigoProyecto
     *
     * @param \IngSoft\DatBundle\Entity\Proyectos $codigoProyecto
     * @return Objetivos
     */
    public function setProyecto(\IngSoft\DatBundle\Entity\Proyectos $proyecto = null)
    {
        $this->proyecto = $proyecto;
    
        return $this;
    }

    /**
     * Get codigoProyecto
     *
     * @return \IngSoft\DatBundle\Entity\Proyectos 
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }
}