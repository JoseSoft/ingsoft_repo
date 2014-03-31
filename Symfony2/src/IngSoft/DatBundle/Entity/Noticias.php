<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticias
 *
 * @ORM\Table(name="noticias")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\NoticiaRepository")
 */
class Noticias
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
     * @ORM\Column(name="tituto", type="string", length=20, nullable=false)
     */
    private $tituto;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text", nullable=false)
     */
    private $contenido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_publicacion", type="datetime", nullable=false)
     */
    private $fechaPublicacion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Etiquetas", mappedBy="codigoNoticia")
     */
    private $etiquetas;

    /**
     * @var \Categorias
     *
     * @ORM\ManyToOne(targetEntity="Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_noticia", referencedColumnName="codigo")
     * })
     */
    private $categoriaNoticia;

   
    function __construct($codigo, $tituto, $contenido, 
            \DateTime $fechaPublicacion, 
            \Doctrine\Common\Collections\Collection $etiquetas, 
            \Categorias $categoriaNoticia) {
        $this->codigo = $codigo;
        $this->tituto = $tituto;
        $this->contenido = $contenido;
        $this->fechaPublicacion = $fechaPublicacion;
        $this->etiquetas = $etiquetas;
        $this->categoriaNoticia = $categoriaNoticia;
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
     * Set tituto
     *
     * @param string $tituto
     * @return Noticias
     */
    public function setTituto($tituto)
    {
        $this->tituto = $tituto;
    
        return $this;
    }

    /**
     * Get tituto
     *
     * @return string 
     */
    public function getTituto()
    {
        return $this->tituto;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Noticias
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    
        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set fechaPublicacion
     *
     * @param \DateTime $fechaPublicacion
     * @return Noticias
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
     * Add codigoEtiqueta
     *
     * @param \IngSoft\DatBundle\Entity\Etiquetas $codigoEtiqueta
     * @return Noticias
     */
    public function addCodigoEtiqueta(\IngSoft\DatBundle\Entity\Etiquetas $codigoEtiqueta)
    {
        $this->etiquetas[] = $codigoEtiqueta;
    
        return $this;
    }

    /**
     * Remove codigoEtiqueta
     *
     * @param \IngSoft\DatBundle\Entity\Etiquetas $codigoEtiqueta
     */
    public function removeCodigoEtiqueta(\IngSoft\DatBundle\Entity\Etiquetas $codigoEtiqueta)
    {
        $this->etiquetas->removeElement($codigoEtiqueta);
    }

    /**
     * Get codigoEtiqueta
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodigoEtiqueta()
    {
        return $this->etiquetas;
    }

    /**
     * Set categoriaNoticia
     *
     * @param \IngSoft\DatBundle\Entity\Categorias $categoriaNoticia
     * @return Noticias
     */
    public function setCategoriaNoticia(\IngSoft\DatBundle\Entity\Categorias $categoriaNoticia = null)
    {
        $this->categoriaNoticia = $categoriaNoticia;
    
        return $this;
    }

    /**
     * Get categoriaNoticia
     *
     * @return \IngSoft\DatBundle\Entity\Categorias 
     */
    public function getCategoriaNoticia()
    {
        return $this->categoriaNoticia;
    }
}