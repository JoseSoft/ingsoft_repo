<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calificaciones
 *
 * @ORM\Table(name="calificaciones")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\CalificacionRepository")
 */
class Calificaciones
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
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=false)
     */
    private $descripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="puntaje_adquicision", type="decimal", nullable=false)
     */
    private $puntajeAdquicision;


    
    function __construct($codigo, $nombre, $descripcion, $puntajeAdquicision) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->puntajeAdquicision = $puntajeAdquicision;
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
     * @return Calificaciones
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
     * @return Calificaciones
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
     * Set puntajeAdquicision
     *
     * @param float $puntajeAdquicision
     * @return Calificaciones
     */
    public function setPuntajeAdquicision($puntajeAdquicision)
    {
        $this->puntajeAdquicision = $puntajeAdquicision;
    
        return $this;
    }

    /**
     * Get puntajeAdquicision
     *
     * @return float 
     */
    public function getPuntajeAdquicision()
    {
        return $this->puntajeAdquicision;
    }
}