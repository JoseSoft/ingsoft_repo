<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyectos
 *
 * @ORM\Table(name="proyectos")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\ProyectoRepository")
 */
class Proyectos
{
    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=30, nullable=false)
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_comienzo", type="date", nullable=false)
     */
    private $fechaComienzo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_limite", type="date", nullable=false)
     */
    private $fechaLimite;

    /**
     * @var float
     *
     * @ORM\Column(name="valor_pagado", type="decimal", nullable=false)
     */
    private $valorPagado;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_trabajadores", type="integer", nullable=false)
     */
    private $cantidadTrabajadores;

    /**
     * @var float
     *
     * @ORM\Column(name="calificacion_total", type="decimal", nullable=true)
     */
    private $calificacionTotal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuarios", inversedBy="codigoProyecto")
     * @ORM\JoinTable(name="prestadores_proyecto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codigo_proyecto", referencedColumnName="codigo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="codigo_prestador", referencedColumnName="cedula")
     *   }
     * )
     */
    private $prestadores;

    /**
     * @var \Promociones
     *
     * @ORM\ManyToOne(targetEntity="Promociones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_promocion", referencedColumnName="codigo")
     * })
     */
    private $promocion;

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
     * @var \Empresas
     *
     * @ORM\ManyToOne(targetEntity="Empresas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_empresa", referencedColumnName="nit")
     * })
     */
    private $empresa;

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
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_moderador", referencedColumnName="cedula")
     * })
     */
    private $moderador;

  
    function __construct($codigo, $nombre, $descripcion, 
            \DateTime $fechaComienzo, 
            \DateTime $fechaLimite, $valorPagado, 
            $cantidadTrabajadores, $calificacionTotal, 
            \Doctrine\Common\Collections\Collection $prestadores,
            \Promociones $promocion, \Categorias $categoria, 
            \Empresas $empresa, \Usuarios $tutor, \Usuarios $moderador) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaComienzo = $fechaComienzo;
        $this->fechaLimite = $fechaLimite;
        $this->valorPagado = $valorPagado;
        $this->cantidadTrabajadores = $cantidadTrabajadores;
        $this->calificacionTotal = $calificacionTotal;
        $this->prestadores = $prestadores;
        $this->promocion = $promocion;
        $this->categoria = $categoria;
        $this->empresa = $empresa;
        $this->tutor = $tutor;
        $this->moderador = $moderador;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Proyectos
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
     * @return Proyectos
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
     * Set fechaComienzo
     *
     * @param \DateTime $fechaComienzo
     * @return Proyectos
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
     * Set fechaLimite
     *
     * @param \DateTime $fechaLimite
     * @return Proyectos
     */
    public function setFechaLimite($fechaLimite)
    {
        $this->fechaLimite = $fechaLimite;
    
        return $this;
    }

    /**
     * Get fechaLimite
     *
     * @return \DateTime 
     */
    public function getFechaLimite()
    {
        return $this->fechaLimite;
    }

    /**
     * Set valorPagado
     *
     * @param float $valorPagado
     * @return Proyectos
     */
    public function setValorPagado($valorPagado)
    {
        $this->valorPagado = $valorPagado;
    
        return $this;
    }

    /**
     * Get valorPagado
     *
     * @return float 
     */
    public function getValorPagado()
    {
        return $this->valorPagado;
    }

    /**
     * Set cantidadTrabajadores
     *
     * @param integer $cantidadTrabajadores
     * @return Proyectos
     */
    public function setCantidadTrabajadores($cantidadTrabajadores)
    {
        $this->cantidadTrabajadores = $cantidadTrabajadores;
    
        return $this;
    }

    /**
     * Get cantidadTrabajadores
     *
     * @return integer 
     */
    public function getCantidadTrabajadores()
    {
        return $this->cantidadTrabajadores;
    }

    /**
     * Set calificacionTotal
     *
     * @param float $calificacionTotal
     * @return Proyectos
     */
    public function setCalificacionTotal($calificacionTotal)
    {
        $this->calificacionTotal = $calificacionTotal;
    
        return $this;
    }

    /**
     * Get calificacionTotal
     *
     * @return float 
     */
    public function getCalificacionTotal()
    {
        return $this->calificacionTotal;
    }

    /**
     * Add codigoPrestador
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $prestador
     * @return Proyectos
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
     * Set codigoPromocion
     *
     * @param \IngSoft\DatBundle\Entity\Promociones $codigoPromocion
     * @return Proyectos
     */
    public function setPromocion(\IngSoft\DatBundle\Entity\Promociones $promocion = null)
    {
        $this->promocion = $promocion;
    
        return $this;
    }

    /**
     * Get codigoPromocion
     *
     * @return \IngSoft\DatBundle\Entity\Promociones 
     */
    public function getPromocion()
    {
        return $this->promocion;
    }

    /**
     * Set codigoCategoria
     *
     * @param \IngSoft\DatBundle\Entity\Categorias $categoria
     * @return Proyectos
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

    /**
     * Set codigoEmpresa
     *
     * @param \IngSoft\DatBundle\Entity\Empresas $codigoEmpresa
     * @return Proyectos
     */
    public function setEmpresa(\IngSoft\DatBundle\Entity\Empresas $empresa = null)
    {
        $this->empresa = $empresa;
    
        return $this;
    }

    /**
     * Get codigoEmpresa
     *
     * @return \IngSoft\DatBundle\Entity\Empresas 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set codigoTutor
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $codigoTutor
     * @return Proyectos
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
    public function getTutor()
    {
        return $this->tutor;
    }

    /**
     * Set codigoModerador
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $codigoModerador
     * @return Proyectos
     */
    public function setModerador(\IngSoft\DatBundle\Entity\Usuarios $moderador = null)
    {
        $this->moderador = $moderador;
    
        return $this;
    }

    /**
     * Get codigoModerador
     *
     * @return \IngSoft\DatBundle\Entity\Usuarios 
     */
    public function getModerador()
    {
        return $this->moderador;
    }
}