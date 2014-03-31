<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListasChequeo
 *
 * @ORM\Table(name="listas_chequeo")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\ListaChequeoRepository")
 */
class ListasChequeo
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
     * @ORM\Column(name="nombre", type="string", length=30, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="url_host", type="text", nullable=false)
     */
    private $urlHost;

    /**
     * @var \Objetivos
     *
     * @ORM\ManyToOne(targetEntity="Objetivos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_objetivo", referencedColumnName="codigo")
     * })
     */
    private $objetivo;


    function __construct($codigo, $nombre, $urlHost, \Objetivos $objetivo) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->urlHost = $urlHost;
        $this->objetivo = $objetivo;
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
     * Set nombre
     *
     * @param string $nombre
     * @return ListasChequeo
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
     * Set urlHost
     *
     * @param string $urlHost
     * @return ListasChequeo
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
     * Set codigoObjetivo
     *
     * @param \IngSoft\DatBundle\Entity\Objetivos $objetivo
     * @return ListasChequeo
     */
    public function setObjetivo(\IngSoft\DatBundle\Entity\Objetivos $objetivo = null)
    {
        $this->objetivo = $objetivo;
    
        return $this;
    }

    /**
     * Get codigoObjetivo
     *
     * @return \IngSoft\DatBundle\Entity\Objetivos 
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }
}