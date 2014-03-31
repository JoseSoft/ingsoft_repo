<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NoticiasCompartidas
 *
 * @ORM\Table(name="noticias_compartidas")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\NoticiaCompartidaRepository")
 */
class NoticiasCompartidas
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_compartida", type="datetime", nullable=false)
     */
    private $fechaCompartida;

    /**
     * @var \Noticias
     *
     * @ORM\ManyToOne(targetEntity="Noticias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_noticia", referencedColumnName="codigo")
     * })
     */
    private $noticia;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_usuario", referencedColumnName="cedula")
     * })
     */
    private $usuario;


    
    
    function __construct($codigo, \DateTime $fechaCompartida, 
            \Noticias $noticia, \Usuarios $usuario) {
        $this->codigo = $codigo;
        $this->fechaCompartida = $fechaCompartida;
        $this->noticia = $noticia;
        $this->usuario = $usuario;
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
     * Set fechaCompartida
     *
     * @param \DateTime $fechaCompartida
     * @return NoticiasCompartidas
     */
    public function setFechaCompartida($fechaCompartida)
    {
        $this->fechaCompartida = $fechaCompartida;
    
        return $this;
    }

    /**
     * Get fechaCompartida
     *
     * @return \DateTime 
     */
    public function getFechaCompartida()
    {
        return $this->fechaCompartida;
    }

    /**
     * Set codigoNoticia
     *
     * @param \IngSoft\DatBundle\Entity\Noticias $noticia
     * @return NoticiasCompartidas
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

    /**
     * Set codigoUsuario
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $codigoUsuario
     * @return NoticiasCompartidas
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
}