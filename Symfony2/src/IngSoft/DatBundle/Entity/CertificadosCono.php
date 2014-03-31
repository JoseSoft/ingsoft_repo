<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CertificadosCono
 *
 * @ORM\Table(name="certificados_cono")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\CertificadoConoRepository")
 */
class CertificadosCono
{
    /**
     * @var string
     *
     * @ORM\Column(name="url_host", type="text", nullable=false)
     */
    private $urlHost;

    /**
     * @var \UsuariosConocimientos
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="UsuariosConocimientos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cod_usuario_cono", referencedColumnName="codigo")
     * })
     */
    private $usuarioCono;



    function __construct($urlHost, \UsuariosConocimientos $usuarioCono) {
        $this->urlHost = $urlHost;
        $this->usuarioCono = $usuarioCono;
    }

    /**
     * Set urlHost
     *
     * @param string $urlHost
     * @return CertificadosCono
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
     * Set codUsuarioCono
     *
     * @param \IngSoft\DatBundle\Entity\UsuariosConocimientos $usuarioCono
     * @return CertificadosCono
     */
    public function setUsuarioCono(\IngSoft\DatBundle\Entity\UsuariosConocimientos $usuarioCono)
    {
        $this->usuarioCono = $usuarioCono;
    
        return $this;
    }

    /**
     * Get codUsuarioCono
     *
     * @return \IngSoft\DatBundle\Entity\UsuariosConocimientos 
     */
    public function getUsuarioCono()
    {
        return $this->usuarioCono;
    }
}