<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actividades
 *
 * @ORM\Table(name="actividades")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\ActividadRepository")
 */
class Actividades
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuarios", mappedBy="codigoActividad")
     */
    private $prestadores;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_tutor", referencedColumnName="cedula")
     * })
     */
    private $tutor;

    /**
     * @var \Objetivos
     *
     * @ORM\ManyToOne(targetEntity="Objetivos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_objetivo", referencedColumnName="codigo")
     * })
     */
    private $objetivo;

    
    function __construct($codigo, $nombre, $descripcion, $calificacion, 
            \Doctrine\Common\Collections\Collection $prestadores, 
            \Usuarios $tutor, \Objetivos $objetivo) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->calificacion = $calificacion;
        $this->prestadores = $prestadores;
        $this->tutor = $tutor;
        $this->objetivo = $objetivo;
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
     * @return Actividades
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
     * @return Actividades
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
     * @return Actividades
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
     * Add codigoPrestador
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $prestadore
     * @return Actividades
     */
    public function addPrestador(\IngSoft\DatBundle\Entity\Usuarios $prestador)
    {
        $this->prestadores[] = $prestador;
    
        return $this;
    }

    /**
     * Remove codigoPrestador
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $prestador
     */
    public function removePrestador(\IngSoft\DatBundle\Entity\Usuarios $prestador)
    {
        $this->prestadores->removeElement($prestador);
    }

    /**
     * Get codigoPrestador
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrestadores()
    {
        return $this->prestadores;
    }

    /**
     * Set codigoTutor
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $tutor
     * @return Actividades
     */
    public function setTutor(\IngSoft\DatBundle\Entity\Usuarios $tutor = null)
    {
        $this->tutor = $tutor;
    
        return $this;
    }

    /**
     * Get codigoTutor
     *
     * @return \IngSoft\DatBundle\Entity\Usuarios 
     */
    public function geTutor()
    {
        return $this->tutor;
    }

    /**
     * Set codigoObjetivo
     *
     * @param \IngSoft\DatBundle\Entity\Objetivos $objetivo
     * @return Actividades
     */
    public function setObjetivo(\IngSoft\DatBundle\Entity\Objetivos $objetivo = null)
    {
        $this->objetivo = $objetivo;
    
        return $this;
    }

    /**
     * Get codigoObjetivo
     *
     * @return \IngSoft\DatBundle\Entity\Objetivos 
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }
}