<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecursosNoticias
 *
 * @ORM\Table(name="recursos_noticias")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\RecursoNoticiaRepository")
 */
class RecursosNoticias
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
     * @ORM\Column(name="nombre_recurso", type="string", length=60, nullable=false)
     */
    private $nombreRecurso;

    /**
     * @var string
     *
     * @ORM\Column(name="url_host_recurso", type="text", nullable=false)
     */
    private $urlHostRecurso;

    /**
     * @var \Noticias
     *
     * @ORM\ManyToOne(targetEntity="Noticias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_noticia", referencedColumnName="codigo")
     * })
     */
    private $noticia;

    
    function __construct($codigo, $nombreRecurso, $urlHostRecurso, 
            \Noticias $noticia) {
        $this->codigo = $codigo;
        $this->nombreRecurso = $nombreRecurso;
        $this->urlHostRecurso = $urlHostRecurso;
        $this->noticia = $noticia;
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
     * Set nombreRecurso
     *
     * @param string $nombreRecurso
     * @return RecursosNoticias
     */
    public function setNombreRecurso($nombreRecurso)
    {
        $this->nombreRecurso = $nombreRecurso;
    
        return $this;
    }

    /**
     * Get nombreRecurso
     *
     * @return string 
     */
    public function getNombreRecurso()
    {
        return $this->nombreRecurso;
    }

    /**
     * Set urlHostRecurso
     *
     * @param string $urlHostRecurso
     * @return RecursosNoticias
     */
    public function setUrlHostRecurso($urlHostRecurso)
    {
        $this->urlHostRecurso = $urlHostRecurso;
    
        return $this;
    }

    /**
     * Get urlHostRecurso
     *
     * @return string 
     */
    public function getUrlHostRecurso()
    {
        return $this->urlHostRecurso;
    }

    /**
     * Set codigoNoticia
     *
     * @param \IngSoft\DatBundle\Entity\Noticias $noticia
     * @return RecursosNoticias
     */
    public function setNoticia(\IngSoft\DatBundle\Entity\Noticias $noticia = null)
    {
        $this->noticia = $noticia;
    
        return $this;
    }

    /**
     * Get codigoNoticia
     *
     * @return \IngSoft\DatBundle\Entity\Noticias 
     */
    public function getNoticia()
    {
        return $this->noticia;
    }
}