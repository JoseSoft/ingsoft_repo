<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pagos
 *
 * @ORM\Table(name="pagos")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\PagoRepository")
 */
class Pagos
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
     * @var float
     *
     * @ORM\Column(name="valor_total", type="decimal", nullable=true)
     */
    private $valorTotal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_pago", type="date", nullable=false)
     */
    private $fechaPago;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tipo_pago", type="boolean", nullable=false)
     */
    private $tipoPago;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_usuario", referencedColumnName="cedula")
     * })
     */
    private $usuario;

    /**
     * @var \Contratos
     *
     * @ORM\ManyToOne(targetEntity="Contratos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_contrato", referencedColumnName="codigo")
     * })
     */
    private $codigo;



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
     * Set valorTotal
     *
     * @param float $valorTotal
     * @return Pagos
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    
        return $this;
    }

    /**
     * Get valorTotal
     *
     * @return float 
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * Set fechaPago
     *
     * @param \DateTime $fechaPago
     * @return Pagos
     */
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;
    
        return $this;
    }

    /**
     * Get fechaPago
     *
     * @return \DateTime 
     */
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * Set tipoPago
     *
     * @param boolean $tipoPago
     * @return Pagos
     */
    public function setTipoPago($tipoPago)
    {
        $this->tipoPago = $tipoPago;
    
        return $this;
    }

    /**
     * Get tipoPago
     *
     * @return boolean 
     */
    public function getTipoPago()
    {
        return $this->tipoPago;
    }

    /**
     * Set codigoUsuario
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $usuario
     * @return Pagos
     */
    public function setUsuario(\IngSoft\DatBundle\Entity\Usuarios $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get codigoUsuario
     *
     * @return \IngSoft\DatBundle\Entity\Usuarios 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set codigoContrato
     *
     * @param \IngSoft\DatBundle\Entity\Contratos $contrato
     * @return Pagos
     */
    public function setCodigoContrato(\IngSoft\DatBundle\Entity\Contratos $contrato = null)
    {
        $this->codigo = $contrato;
    
        return $this;
    }

    /**
     * Get codigoContrato
     *
     * @return \IngSoft\DatBundle\Entity\Contratos 
     */
    public function getCodigoContrato()
    {
        return $this->codigo;
    }
}