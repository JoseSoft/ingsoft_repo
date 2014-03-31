<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Institutos
 *
 * @ORM\Table(name="institutos")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\InstitutoRepository")
 */
class Institutos
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
     * @ORM\Column(name="direccion", type="string", length=90, nullable=false)
     */
    private $direccion;

    /**
     * @var \Barrios
     *
     * @ORM\ManyToOne(targetEntity="Barrios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_barrio", referencedColumnName="codigo")
     * })
     */
    private $barrio;



    function __construct($codigo, $direccion, \Barrios $barrio) {
        $this->codigo = $codigo;
        $this->direccion = $direccion;
        $this->barrio = $barrio;
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
     * Set direccion
     *
     * @param string $direccion
     * @return Institutos
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
     * Set codigoBarrio
     *
     * @param \IngSoft\DatBundle\Entity\Barrios $barrio
     * @return Institutos
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
}