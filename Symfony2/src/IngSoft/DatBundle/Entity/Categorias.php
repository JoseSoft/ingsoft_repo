<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorias
 *
 * @ORM\Table(name="categorias")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\CategoriaRepository")
 */
class Categorias
{
    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=60, nullable=false)
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
     * @ORM\Column(name="descripcion", type="text", nullable=false)
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="eliminada", type="boolean", nullable=false)
     */
    private $eliminada;

    /**
     * @var \Categorias
     *
     * @ORM\ManyToOne(targetEntity="Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_mayor", referencedColumnName="codigo")
     * })
     */
    private $categoriaMayor;



    function __construct($codigo, $nombre, $descripcion, $eliminada, \Categorias $categoriaMayor) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->eliminada = $eliminada;
        $this->categoriaMayor = $categoriaMayor;
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
     * @return Categorias
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Categorias
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set eliminada
     *
     * @param boolean $eliminada
     * @return Categorias
     */
    public function setEliminada($eliminada)
    {
        $this->eliminada = $eliminada;
    
        return $this;
    }

    /**
     * Get eliminada
     *
     * @return boolean 
     */
    public function getEliminada()
    {
        return $this->eliminada;
    }

    /**
     * Set categoriaMayor
     *
     * @param \IngSoft\DatBundle\Entity\Categorias $categoriaMayor
     * @return Categorias
     */
    public function setCategoriaMayor(\IngSoft\DatBundle\Entity\Categorias $categoriaMayor = null)
    {
        $this->categoriaMayor = $categoriaMayor;
    
        return $this;
    }

    /**
     * Get categoriaMayor
     *
     * @return \IngSoft\DatBundle\Entity\Categorias 
     */
    public function getCategoriaMayor()
    {
        return $this->categoriaMayor;
    }
}