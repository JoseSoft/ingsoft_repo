<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicitudes
 *
 * @ORM\Table(name="solicitudes")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\SolicitudRepository")
 */
class Solicitudes
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
     * @var integer
     *
     * @ORM\Column(name="numero_pres_solicitados", type="integer", nullable=false)
     */
    private $numeroPresSolicitados;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_publicacion", type="datetime", nullable=false)
     */
    private $fechaPublicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=false)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_lim_respuesta", type="datetime", nullable=false)
     */
    private $fechaLimRespuesta;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Etiquetas", inversedBy="codigoSolicitud")
     * @ORM\JoinTable(name="etiquetas_solicitudes",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codigo_solicitud", referencedColumnName="codigo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="codigo_etiqueta", referencedColumnName="codigo")
     *   }
     * )
     */
    private $etiquetas;

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
     * @var \Empresas
     *
     * @ORM\ManyToOne(targetEntity="Empresas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_empresa", referencedColumnName="nit")
     * })
     */
    private $empresa;

    /**
     * @var \Foros
     *
     * @ORM\ManyToOne(targetEntity="Foros")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_foro", referencedColumnName="codigo")
     * })
     */
    private $foro;

    
    function __construct($codigo, $numeroPresSolicitados, 
            \DateTime $fechaPublicacion, $descripcion, 
            \DateTime $fechaLimRespuesta, 
            \Doctrine\Common\Collections\Collection $etiquetas, 
            \Promociones $promocion, \Empresas $empresa, \Foros $foro) {
        $this->codigo = $codigo;
        $this->numeroPresSolicitados = $numeroPresSolicitados;
        $this->fechaPublicacion = $fechaPublicacion;
        $this->descripcion = $descripcion;
        $this->fechaLimRespuesta = $fechaLimRespuesta;
        $this->etiquetas = $etiquetas;
        $this->promocion = $promocion;
        $this->empresa = $empresa;
        $this->foro = $foro;
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
     * Set numeroPresSolicitados
     *
     * @param integer $numeroPresSolicitados
     * @return Solicitudes
     */
    public function setNumeroPresSolicitados($numeroPresSolicitados)
    {
        $this->numeroPresSolicitados = $numeroPresSolicitados;
    
        return $this;
    }

    /**
     * Get numeroPresSolicitados
     *
     * @return integer 
     */
    public function getNumeroPresSolicitados()
    {
        return $this->numeroPresSolicitados;
    }

    /**
     * Set fechaPublicacion
     *
     * @param \DateTime $fechaPublicacion
     * @return Solicitudes
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;
    
        return $this;
    }

    /**
     * Get fechaPublicacion
     *
     * @return \DateTime 
     */
    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Solicitudes
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
     * Set fechaLimRespuesta
     *
     * @param \DateTime $fechaLimRespuesta
     * @return Solicitudes
     */
    public function setFechaLimRespuesta($fechaLimRespuesta)
    {
        $this->fechaLimRespuesta = $fechaLimRespuesta;
    
        return $this;
    }

    /**
     * Get fechaLimRespuesta
     *
     * @return \DateTime 
     */
    public function getFechaLimRespuesta()
    {
        return $this->fechaLimRespuesta;
    }

    /**
     * Add codigoEtiqueta
     *
     * @param \IngSoft\DatBundle\Entity\Etiquetas $etiqueta
     * @return Solicitudes
     */
    public function addEtiqueta(\IngSoft\DatBundle\Entity\Etiquetas $etiqueta)
    {
        $this->etiquetas[] = $etiqueta;
    
        return $this;
    }

    /**
     * Remove codigoEtiqueta
     *
     * @param \IngSoft\DatBundle\Entity\Etiquetas $etiqueta
     */
    public function removeEtiqueta(\IngSoft\DatBundle\Entity\Etiquetas $etiqueta)
    {
        $this->etiquetas->removeElement($etiqueta);
    }

    /**
     * Get codigoEtiqueta
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEtiquetas()
    {
        return $this->etiquetas;
    }

    /**
     * Set codigoPromocion
     *
     * @param \IngSoft\DatBundle\Entity\Promociones $promocion
     * @return Solicitudes
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
     * Set codigoEmpresa
     *
     * @param \IngSoft\DatBundle\Entity\Empresas $codigoEmpresa
     * @return Solicitudes
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
     * Set codigoForo
     *
     * @param \IngSoft\DatBundle\Entity\Foros $foro
     * @return Solicitudes
     */
    public function setForo(\IngSoft\DatBundle\Entity\Foros $foro = null)
    {
        $this->foro = $foro;
    
        return $this;
    }

    /**
     * Get codigoForo
     *
     * @return \IngSoft\DatBundle\Entity\Foros 
     */
    public function getForo()
    {
        return $this->foro;
    }
}