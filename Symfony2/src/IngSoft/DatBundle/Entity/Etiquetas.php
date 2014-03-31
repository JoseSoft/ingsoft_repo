<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etiquetas
 *
 * @ORM\Table(name="etiquetas")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\EtiquetaRepository")
 */
class Etiquetas
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
     * @ORM\Column(name="nombre_etiqueta", type="string", length=50, nullable=true)
     */
    private $nombreEtiqueta;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Conocimientos", inversedBy="codigoEtiqueta")
     * @ORM\JoinTable(name="etiquetas_conocimiento",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codigo_etiqueta", referencedColumnName="codigo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="codigo_conocimiento", referencedColumnName="codigo")
     *   }
     * )
     */
    private $conocimientos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Noticias", inversedBy="codigoEtiqueta")
     * @ORM\JoinTable(name="etiquetas_noticias",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codigo_etiqueta", referencedColumnName="codigo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="codigo_noticia", referencedColumnName="codigo")
     *   }
     * )
     */
    private $noticias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PruebasTecnicas", mappedBy="codigoEtiqueta")
     */
    private $pruebasTecnicas;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Solicitudes", mappedBy="codigoEtiqueta")
     */
    private $solicitudes;

  
    
    function __construct($codigo, $nombreEtiqueta, 
            \Doctrine\Common\Collections\Collection $conocimientos, 
            \Doctrine\Common\Collections\Collection $noticias, 
            \Doctrine\Common\Collections\Collection $pruebasTecnicas, 
            \Doctrine\Common\Collections\Collection $solicitudes) {
        $this->codigo = $codigo;
        $this->nombreEtiqueta = $nombreEtiqueta;
        $this->conocimientos = $conocimientos;
        $this->noticias = $noticias;
        $this->pruebasTecnicas = $pruebasTecnicas;
        $this->solicitudes = $solicitudes;
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
     * Set nombreEtiqueta
     *
     * @param string $nombreEtiqueta
     * @return Etiquetas
     */
    public function setNombreEtiqueta($nombreEtiqueta)
    {
        $this->nombreEtiqueta = $nombreEtiqueta;
    
        return $this;
    }

    /**
     * Get nombreEtiqueta
     *
     * @return string 
     */
    public function getNombreEtiqueta()
    {
        return $this->nombreEtiqueta;
    }

    /**
     * Add codigoConocimiento
     *
     * @param \IngSoft\DatBundle\Entity\Conocimientos $conocimiento
     * @return Etiquetas
     */
    public function addConocimiento(\IngSoft\DatBundle\Entity\Conocimientos $conocimiento)
    {
        $this->conocimientos[] = $conocimiento;
    
        return $this;
    }

    /**
     * Remove codigoConocimiento
     *
     * @param \IngSoft\DatBundle\Entity\Conocimientos $conocimiento
     */
    public function removeConocimiento(\IngSoft\DatBundle\Entity\Conocimientos $conocimiento)
    {
        $this->conocimientos->removeElement($conocimiento);
    }

    /**
     * Get codigoConocimiento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConocimientos()
    {
        return $this->conocimientos;
    }

    /**
     * Add codigoNoticia
     *
     * @param \IngSoft\DatBundle\Entity\Noticias $codigoNoticia
     * @return Etiquetas
     */
    public function addNoticia(\IngSoft\DatBundle\Entity\Noticias $noticia)
    {
        $this->noticias[] = $noticia;
    
        return $this;
    }

    /**
     * Remove codigoNoticia
     *
     * @param \IngSoft\DatBundle\Entity\Noticias $codigoNoticia
     */
    public function removeNoticia(\IngSoft\DatBundle\Entity\Noticias $noticia)
    {
        $this->noticias->removeElement($noticia);
    }

    /**
     * Get codigoNoticia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNoticia()
    {
        return $this->noticias;
    }

    /**
     * Add codigoPrueba
     *
     * @param \IngSoft\DatBundle\Entity\PruebasTecnicas $codigoPrueba
     * @return Etiquetas
     */
    public function addPrueba(\IngSoft\DatBundle\Entity\PruebasTecnicas $prueba)
    {
        $this->pruebasTecnicas[] = $prueba;
    
        return $this;
    }

    /**
     * Remove codigoPrueba
     *
     * @param \IngSoft\DatBundle\Entity\PruebasTecnicas $codigoPrueba
     */
    public function removePrueba(\IngSoft\DatBundle\Entity\PruebasTecnicas $codigoPrueba)
    {
        $this->pruebasTecnicas->removeElement($codigoPrueba);
    }

    /**
     * Get codigoPrueba
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrueba()
    {
        return $this->pruebasTecnicas;
    }

    /**
     * Add codigoSolicitud
     *
     * @param \IngSoft\DatBundle\Entity\Solicitudes $codigoSolicitud
     * @return Etiquetas
     */
    public function addSolicitud(\IngSoft\DatBundle\Entity\Solicitudes $solicitud)
    {
        $this->solicitudes[] = $solicitud;
    
        return $this;
    }

    /**
     * Remove codigoSolicitud
     *
     * @param \IngSoft\DatBundle\Entity\Solicitudes $codigoSolicitud
     */
    public function removeSolicitud(\IngSoft\DatBundle\Entity\Solicitudes $solicitud)
    {
        $this->solicitudes->removeElement($solicitud);
    }

    /**
     * Get codigoSolicitud
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSolicitud()
    {
        return $this->solicitudes;
    }
}