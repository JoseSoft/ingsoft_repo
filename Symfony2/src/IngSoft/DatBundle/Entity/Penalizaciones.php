<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Penalizaciones
 *
 * @ORM\Table(name="penalizaciones")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\PenalizacionRepository")
 */
class Penalizaciones
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
     * @ORM\Column(name="motivo", type="string", length=60, nullable=false)
     */
    private $motivo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="datetime", nullable=false)
     */
    private $fechaFin;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_prestador", referencedColumnName="cedula")
     * })
     */
    private $prestador;


    function __construct($codigo, $motivo, \DateTime $fechaInicio,
            \DateTime $fechaFin, \Usuarios $prestador) {
        $this->codigo = $codigo;
        $this->motivo = $motivo;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->prestador = $prestador;
    }

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
     * Set motivo
     *
     * @param string $motivo
     * @return Penalizaciones
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    
        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Penalizaciones
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    
        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Penalizaciones
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    
        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set codigoPrestador
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $prestador
     * @return Penalizaciones
     */
    public function setPrestador(\IngSoft\DatBundle\Entity\Usuarios $prestador = null)
    {
        $this->prestador = $prestador;
    
        return $this;
    }

    /**
     * Get codigoPrestador
     *
     * @return \IngSoft\DatBundle\Entity\Usuarios 
     */
    public function getPrestador()
    {
        return $this->prestador;
    }
}