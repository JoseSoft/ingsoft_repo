<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promociones
 *
 * @ORM\Table(name="promociones")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\PromocionRepository")
 */
class Promociones
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_comienzo", type="datetime", nullable=false)
     */
    private $fechaComienzo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="datetime", nullable=false)
     */
    private $fechaFin;

    /**
     * @var float
     *
     * @ORM\Column(name="porcentaje_descuento", type="decimal", nullable=false)
     */
    private $porcentajeDescuento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
     */
    private $nombre;



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
     * Set fechaComienzo
     *
     * @param \DateTime $fechaComienzo
     * @return Promociones
     */
    public function setFechaComienzo($fechaComienzo)
    {
        $this->fechaComienzo = $fechaComienzo;
    
        return $this;
    }

    /**
     * Get fechaComienzo
     *
     * @return \DateTime 
     */
    public function getFechaComienzo()
    {
        return $this->fechaComienzo;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Promociones
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
     * Set porcentajeDescuento
     *
     * @param float $porcentajeDescuento
     * @return Promociones
     */
    public function setPorcentajeDescuento($porcentajeDescuento)
    {
        $this->porcentajeDescuento = $porcentajeDescuento;
    
        return $this;
    }

    /**
     * Get porcentajeDescuento
     *
     * @return float 
     */
    public function getPorcentajeDescuento()
    {
        return $this->porcentajeDescuento;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Promociones
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
}