<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administradores
 *
 * @ORM\Table(name="administradores")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\AdministradorRepository")
 */
class Administradores
{
    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", length=60, nullable=false)
     */
    private $correoElectronico;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasenia", type="string", length=30, nullable=false)
     */
    private $contrasenia;



    function __construct($codigo, $correoElectronico, $contrasenia) {
        $this->codigo = $codigo;
        $this->correoElectronico = $correoElectronico;
        $this->contrasenia = $contrasenia;
    }

    
    
    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     * @return Administradores
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;
    
        return $this;
    }

    /**
     * Get correoElectronico
     *
     * @return string 
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * Set contrasenia
     *
     * @param string $contrasenia
     * @return Administradores
     */
    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    
        return $this;
    }

    /**
     * Get contrasenia
     *
     * @return string 
     */
    public function getContrasenia()
    {
        return $this->contrasenia;
    }
}