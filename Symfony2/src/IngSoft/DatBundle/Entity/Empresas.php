<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresas
 *
 * @ORM\Table(name="empresas")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\EmpresaRepository")
 */
class Empresas
{
    /**
     * @var string
     *
     * @ORM\Column(name="nit", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nit;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=60, nullable=false)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=90, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=false)
     */
    private $telefono;

    /**
     * @var \Barrios
     *
     * @ORM\ManyToOne(targetEntity="Barrios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_barrio", referencedColumnName="codigo")
     * })
     */
    private $barrio;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_cliente_fiel", referencedColumnName="cedula")
     * })
     */
    private $clienteFiel;


    
    function __construct($nit, $correo, $direccion, $telefono, \Barrios $barrio, \Usuarios $clienteFiel) {
        $this->nit = $nit;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->barrio = $barrio;
        $this->clienteFiel = $clienteFiel;
    }

        /**
     * Get nit
     *
     * @return string 
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Empresas
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    
        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Empresas
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Empresas
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set codigoBarrio
     *
     * @param \IngSoft\DatBundle\Entity\Barrios $barrio
     * @return Empresas
     */
    public function setBarrio(\IngSoft\DatBundle\Entity\Barrios $barrio = null)
    {
        $this->barrio = $barrio;
    
        return $this;
    }

    /**
     * Get codigoBarrio
     *
     * @return \IngSoft\DatBundle\Entity\Barrios 
     */
    public function getBarrio()
    {
        return $this->barrio;
    }

    /**
     * Set codigoClienteFiel
     *
     * @param \IngSoft\DatBundle\Entity\Usuarios $clienteFiel
     * @return Empresas
     */
    public function setClienteFiel(\IngSoft\DatBundle\Entity\Usuarios $clienteFiel = null)
    {
        $this->clienteFiel = $clienteFiel;
    
        return $this;
    }

    /**
     * Get codigoClienteFiel
     *
     * @return \IngSoft\DatBundle\Entity\Usuarios 
     */
    public function getClienteFiel()
    {
        return $this->clienteFiel;
    }
}