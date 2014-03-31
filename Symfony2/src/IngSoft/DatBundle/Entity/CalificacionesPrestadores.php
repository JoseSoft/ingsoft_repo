<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CalificacionesPrestadores
 *
 * @ORM\Table(name="calificaciones_prestadores")
 * @ORM\Entity
 */
class CalificacionesPrestadores {

    /**
     * @var integer
     *
     * @ORM\Column(name="codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actual", type="boolean", nullable=false)
     */
    private $actual;

    /**
     * @var \Calificaciones
     *
     * @ORM\ManyToOne(targetEntity="Calificaciones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_calificacion", referencedColumnName="codigo")
     * })
     */
    private $calificacion;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_prestador", referencedColumnName="cedula")
     * })
     */
    private $prestador;

    function __construct($codigo, $actual, \Calificaciones $calificacion, \Usuarios $prestador) {
        $this->codigo = $codigo;
        $this->actual = $actual;
        $this->calificacion = $calificacion;
        $this->prestador = $prestador;
    }

    /**
     * Get codigo
     *
     * @return integer 
     */
    public function getCodigo() {
        return $this->codigo;
    }

    /**
     * Set actual
     *
     * @param boolean $actual
     * @return CalificacionesPrestadores
     */
    public function setActual($actual) {
        $this->actual = $actual;

        return $this;
    }

    /**
     * Get actual
     *
     * @return boolean 
     */
    public function getActual() {
        return $this->actual;
    }

    /**
     * Set codigoCalificacion
     *
     * @param \IngSoft\DatBundle\Entity\Calificaciones $calificacion
     * @return CalificacionesPrestadores
     */
    public function setCalificacion(\IngSoft\DatBundle\Entity\Calificaciones $calificacion = null) {
        $this->calificacion = $calificacion;

        return $this;
    }

    /**
     * Get codigoCalificacion
     *
     * @return \IngSoft\DatBundle\Entity\Calificaciones 
     */
    public function getCalificacion() {
        return $this->calificacion;
    }

    /**
     * Set codigoPrestador
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $prestador
     * @return CalificacionesPrestadores
     */
    public function setPrestador(\IngSoft\DatBundle\Entity\Usuarios $prestador = null) {
        $this->prestador = $prestador;

        return $this;
    }

    /**
     * Get codigoPrestador
     *
     * @return \IngSoft\DatBundle\Entity\Usuarios 
     */
    public function getPrestador() {
        return $this->prestador;
    }

}