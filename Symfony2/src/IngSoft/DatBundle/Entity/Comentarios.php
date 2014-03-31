<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentarios
 *
 * @ORM\Table(name="comentarios")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\ComentarioRepository")
 */
class Comentarios
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
     * @ORM\Column(name="comentario", type="text", nullable=false)
     */
    private $comentario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_visitante", type="string", length=60, nullable=false)
     */
    private $nombreVisitante;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_visitante", type="string", length=70, nullable=false)
     */
    private $correoVisitante;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_publicacion", type="datetime", nullable=false)
     */
    private $fechaPublicacion;

    /**
     * @var \Noticias
     *
     * @ORM\ManyToOne(targetEntity="Noticias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comentario_noticia", referencedColumnName="codigo")
     * })
     */
    private $comentarioNoticia;


    
    function __construct($codigo, $comentario, $nombreVisitante, 
            $correoVisitante, \DateTime $fechaPublicacion, 
            \Noticias $comentarioNoticia) {
        $this->codigo = $codigo;
        $this->comentario = $comentario;
        $this->nombreVisitante = $nombreVisitante;
        $this->correoVisitante = $correoVisitante;
        $this->fechaPublicacion = $fechaPublicacion;
        $this->comentarioNoticia = $comentarioNoticia;
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
     * Set comentario
     *
     * @param string $comentario
     * @return Comentarios
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    
        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set nombreVisitante
     *
     * @param string $nombreVisitante
     * @return Comentarios
     */
    public function setNombreVisitante($nombreVisitante)
    {
        $this->nombreVisitante = $nombreVisitante;
    
        return $this;
    }

    /**
     * Get nombreVisitante
     *
     * @return string 
     */
    public function getNombreVisitante()
    {
        return $this->nombreVisitante;
    }

    /**
     * Set correoVisitante
     *
     * @param string $correoVisitante
     * @return Comentarios
     */
    public function setCorreoVisitante($correoVisitante)
    {
        $this->correoVisitante = $correoVisitante;
    
        return $this;
    }

    /**
     * Get correoVisitante
     *
     * @return string 
     */
    public function getCorreoVisitante()
    {
        return $this->correoVisitante;
    }

    /**
     * Set fechaPublicacion
     *
     * @param \DateTime $fechaPublicacion
     * @return Comentarios
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
     * Set comentarioNoticia
     *
     * @param \IngSoft\DatBundle\Entity\Noticias $comentarioNoticia
     * @return Comentarios
     */
    public function setComentarioNoticia(\IngSoft\DatBundle\Entity\Noticias $comentarioNoticia = null)
    {
        $this->comentarioNoticia = $comentarioNoticia;
    
        return $this;
    }

    /**
     * Get comentarioNoticia
     *
     * @return \IngSoft\DatBundle\Entity\Noticias 
     */
    public function getComentarioNoticia()
    {
        return $this->comentarioNoticia;
    }
}