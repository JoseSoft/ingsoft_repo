<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Barrios
 *
 * @ORM\Table(name="barrios")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\BarrioRepository")
 */
class Barrios
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
     * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_localidad", type="integer", nullable=false)
     */
    private $numeroLocalidad;

    /**
     * @var \Municipios
     *
     * @ORM\ManyToOne(targetEntity="Municipios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_municipio", referencedColumnName="codigo")
     * })
     */
    private $municipio;

    function __construct($codigo, $nombre, $numeroLocalidad, 
            \Municipios $municipio) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->numeroLocalidad = $numeroLocalidad;
        $this->municipio = $municipio;
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
     * @return Barrios
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
     * Set numeroLocalidad
     *
     * @param integer $numeroLocalidad
     * @return Barrios
     */
    public function setNumeroLocalidad($numeroLocalidad)
    {
        $this->numeroLocalidad = $numeroLocalidad;
    
        return $this;
    }

    /**
     * Get numeroLocalidad
     *
     * @return integer 
     */
    public function getNumeroLocalidad()
    {
        return $this->numeroLocalidad;
    }

    /**
     * Set codigoMunicipio
     *
     * @param \IngSoft\DatBundle\Entity\Municipios $municipio
     * @return Barrios
     */
    public function setMunicipio(\IngSoft\DatBundle\Entity\Municipios $municipio = null)
    {
        $this->municipio = $municipio;
    
        return $this;
    }

    /**
     * Get codigoMunicipio
     *
     * @return \IngSoft\DatBundle\Entity\Municipios 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }
}