<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contratos
 *
 * @ORM\Table(name="contratos")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\ContratoRepository")
 */
class Contratos
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
     * @ORM\Column(name="url_pdf", type="text", nullable=false)
     */
    private $urlPdf;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_firmado", type="date", nullable=false)
     */
    private $fechaFirmado;

    /**
     * @var \Proyectos
     *
     * @ORM\ManyToOne(targetEntity="Proyectos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_proyecto", referencedColumnName="codigo")
     * })
     */
    private $proyecto;


    function __construct($codigo, $urlPdf, \DateTime $fechaFirmado, \Proyectos $proyecto) {
        $this->codigo = $codigo;
        $this->urlPdf = $urlPdf;
        $this->fechaFirmado = $fechaFirmado;
        $this->proyecto = $proyecto;
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
     * Set urlPdf
     *
     * @param string $urlPdf
     * @return Contratos
     */
    public function setUrlPdf($urlPdf)
    {
        $this->urlPdf = $urlPdf;
    
        return $this;
    }

    /**
     * Get urlPdf
     *
     * @return string 
     */
    public function getUrlPdf()
    {
        return $this->urlPdf;
    }

    /**
     * Set fechaFirmado
     *
     * @param \DateTime $fechaFirmado
     * @return Contratos
     */
    public function setFechaFirmado($fechaFirmado)
    {
        $this->fechaFirmado = $fechaFirmado;
    
        return $this;
    }

    /**
     * Get fechaFirmado
     *
     * @return \DateTime 
     */
    public function getFechaFirmado()
    {
        return $this->fechaFirmado;
    }

    /**
     * Set codigoProyecto
     *
     * @param \IngSoft\DatBundle\Entity\Proyectos $proyecto
     * @return Contratos
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