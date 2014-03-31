<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referencias
 *
 * @ORM\Table(name="referencias")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\ReferenciaRepository")
 */
class Referencias
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
     * @ORM\Column(name="enlace_referencia", type="text", nullable=false)
     */
    private $enlaceReferencia;

    /**
     * @var \Noticias
     *
     * @ORM\ManyToOne(targetEntity="Noticias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="noticias_codigo", referencedColumnName="codigo")
     * })
     */
    private $noticia;

    function __construct($codigo, $enlaceReferencia, \Noticias $noticia) {
        $this->codigo = $codigo;
        $this->enlaceReferencia = $enlaceReferencia;
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
     * Set enlaceReferencia
     *
     * @param string $enlaceReferencia
     * @return Referencias
     */
    public function setEnlaceReferencia($enlaceReferencia)
    {
        $this->enlaceReferencia = $enlaceReferencia;
    
        return $this;
    }

    /**
     * Get enlaceReferencia
     *
     * @return string 
     */
    public function getEnlaceReferencia()
    {
        return $this->enlaceReferencia;
    }

    /**
     * Set noticiasCodigo
     *
     * @param \IngSoft\DatBundle\Entity\Noticias $noticia
     * @return Referencias
     */
    public function setNoticia(\IngSoft\DatBundle\Entity\Noticias $noticia = null)
    {
        $this->noticia = $noticia;
    
        return $this;
    }

    /**
     * Get noticiasCodigo
     *
     * @return \IngSoft\DatBundle\Entity\Noticias 
     */
    public function getNoticia()
    {
        return $this->noticia;
    }
}