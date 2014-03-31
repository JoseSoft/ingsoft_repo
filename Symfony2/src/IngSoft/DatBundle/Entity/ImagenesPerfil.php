<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImagenesPerfil
 *
 * @ORM\Table(name="imagenes_perfil")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\ImagenPerfilRepository")
 */
class ImagenesPerfil
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
     * @ORM\Column(name="url_host", type="text", nullable=false)
     */
    private $urlHost;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_usuario", referencedColumnName="cedula")
     * })
     */
    private $usuario;


    function __construct($codigo, $urlHost, \Usuarios $usuario) {
        $this->codigo = $codigo;
        $this->urlHost = $urlHost;
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
     * Set urlHost
     *
     * @param string $urlHost
     * @return ImagenesPerfil
     */
    public function setUrlHost($urlHost)
    {
        $this->urlHost = $urlHost;
    
        return $this;
    }

    /**
     * Get urlHost
     *
     * @return string 
     */
    public function getUrlHost()
    {
        return $this->urlHost;
    }

    /**
     * Set codigoUsuario
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $codigoUsuario
     * @return ImagenesPerfil
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