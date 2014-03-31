<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipios
 *
 * @ORM\Table(name="municipios")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\MunicipioRepository")
 */
class Municipios
{
    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_postal", type="string", length=8, nullable=false)
     */
    private $codigoPostal;

    /**
     * @var \Departamentos
     *
     * @ORM\ManyToOne(targetEntity="Departamentos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_departamento", referencedColumnName="codigo")
     * })
     */
    private $departamento;

    
    function __construct($codigo, $nombre, $codigoPostal, \Departamentos $departamento) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->codigoPostal = $codigoPostal;
        $this->departamento = $departamento;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Municipios
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set codigoPostal
     *
     * @param string $codigoPostal
     * @return Municipios
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;
    
        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return string 
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set codigoDepartamento
     *
     * @param \IngSoft\DatBundle\Entity\Departamentos $departamento
     * @return Municipios
     */
    public function setDepartamento(\IngSoft\DatBundle\Entity\Departamentos $departamento = null)
    {
        $this->departamento = $departamento;
    
        return $this;
    }

    /**
     * Get codigoDepartamento
     *
     * @return \IngSoft\DatBundle\Entity\Departamentos 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
}