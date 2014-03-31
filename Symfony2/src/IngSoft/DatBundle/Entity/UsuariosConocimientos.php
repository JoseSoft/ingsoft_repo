<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosConocimientos
 *
 * @ORM\Table(name="usuarios_conocimientos")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\UsuarioConocimientoRepository")
 */
class UsuariosConocimientos
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
     * @var \Institutos
     *
     * @ORM\ManyToOne(targetEntity="Institutos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="instituto_certificado", referencedColumnName="codigo")
     * })
     */
    private $institutoCertificado;

    /**
     * @var \Conocimientos
     *
     * @ORM\ManyToOne(targetEntity="Conocimientos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_conocimiento", referencedColumnName="codigo")
     * })
     */
    private $conocimiento;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_usuario", referencedColumnName="cedula")
     * })
     */
    private $usuario;



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
     * Set institutoCertificado
     *
     * @param \IngSoft\DatBundle\Entity\Institutos $institutoCertificado
     * @return UsuariosConocimientos
     */
    public function setInstitutoCertificado(\IngSoft\DatBundle\Entity\Institutos $institutoCertificado = null)
    {
        $this->institutoCertificado = $institutoCertificado;
    
        return $this;
    }

    /**
     * Get institutoCertificado
     *
     * @return \IngSoft\DatBundle\Entity\Institutos 
     */
    public function getInstitutoCertificado()
    {
        return $this->institutoCertificado;
    }

    /**
     * Set codigoConocimiento
     *
     * @param \IngSoft\DatBundle\Entity\Conocimientos $conocimiento
     * @return UsuariosConocimientos
     */
    public function setConocimiento(\IngSoft\DatBundle\Entity\Conocimientos $conocimiento = null)
    {
        $this->conocimiento = $conocimiento;
    
        return $this;
    }

    /**
     * Get codigoConocimiento
     *
     * @return \IngSoft\DatBundle\Entity\Conocimientos 
     */
    public function getConocimiento()
    {
        return $this->conocimiento;
    }

    /**
     * Set codigoUsuario
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $usuario
     * @return UsuariosConocimientos
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