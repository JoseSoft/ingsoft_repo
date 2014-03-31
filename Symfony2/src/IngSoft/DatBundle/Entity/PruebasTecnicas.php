<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PruebasTecnicas
 *
 * @ORM\Table(name="pruebas_tecnicas")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\PruebaTecnicaRepository")
 */
class PruebasTecnicas
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
     * @var float
     *
     * @ORM\Column(name="calificacion_total", type="decimal", nullable=false)
     */
    private $calificacionTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="url_pdf", type="text", nullable=false)
     */
    private $urlPdf;

    /**
     * @var float
     *
     * @ORM\Column(name="numero_preguntas", type="decimal", nullable=false)
     */
    private $numeroPreguntas;

    /**
     * @var float
     *
     * @ORM\Column(name="dificultad_prueba", type="decimal", nullable=false)
     */
    private $dificultadPrueba;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Etiquetas", inversedBy="codigoPrueba")
     * @ORM\JoinTable(name="etiquetas_pruebas",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codigo_prueba", referencedColumnName="codigo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="codigo_etiqueta", referencedColumnName="codigo")
     *   }
     * )
     */
    private $etiquetas;

    /**
     * @var \Administradores
     *
     * @ORM\ManyToOne(targetEntity="Administradores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_administrador", referencedColumnName="correo_electronico")
     * })
     */
    private $administrador;

    /**
     * @var \Categorias
     *
     * @ORM\ManyToOne(targetEntity="Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_categoria", referencedColumnName="codigo")
     * })
     */
    private $categoria;

    function __construct($codigo, $calificacionTotal, 
            $descripcion, $urlPdf, 
            $numeroPreguntas, $dificultadPrueba, 
            \Doctrine\Common\Collections\Collection $etiquetas, 
            \Administradores $administrador, 
            \Categorias $categoria) {
        $this->codigo = $codigo;
        $this->calificacionTotal = $calificacionTotal;
        $this->descripcion = $descripcion;
        $this->urlPdf = $urlPdf;
        $this->numeroPreguntas = $numeroPreguntas;
        $this->dificultadPrueba = $dificultadPrueba;
        $this->etiquetas = $etiquetas;
        $this->administrador = $administrador;
        $this->categoria = $categoria;
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
     * Set calificacionTotal
     *
     * @param float $calificacionTotal
     * @return PruebasTecnicas
     */
    public function setCalificacionTotal($calificacionTotal)
    {
        $this->calificacionTotal = $calificacionTotal;
    
        return $this;
    }

    /**
     * Get calificacionTotal
     *
     * @return float 
     */
    public function getCalificacionTotal()
    {
        return $this->calificacionTotal;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return PruebasTecnicas
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
     * Set urlPdf
     *
     * @param string $urlPdf
     * @return PruebasTecnicas
     */
    public function setUrlPdf($urlPdf)
    {
        $this->urlPdf = $urlPdf;
    
        return $this;
    }

    /**
     * Get urlPdf
     *
     * @return string 
     */
    public function getUrlPdf()
    {
        return $this->urlPdf;
    }

    /**
     * Set numeroPreguntas
     *
     * @param float $numeroPreguntas
     * @return PruebasTecnicas
     */
    public function setNumeroPreguntas($numeroPreguntas)
    {
        $this->numeroPreguntas = $numeroPreguntas;
    
        return $this;
    }

    /**
     * Get numeroPreguntas
     *
     * @return float 
     */
    public function getNumeroPreguntas()
    {
        return $this->numeroPreguntas;
    }

    /**
     * Set dificultadPrueba
     *
     * @param float $dificultadPrueba
     * @return PruebasTecnicas
     */
    public function setDificultadPrueba($dificultadPrueba)
    {
        $this->dificultadPrueba = $dificultadPrueba;
    
        return $this;
    }

    /**
     * Get dificultadPrueba
     *
     * @return float 
     */
    public function getDificultadPrueba()
    {
        return $this->dificultadPrueba;
    }

    /**
     * Add codigoEtiqueta
     *
     * @param \IngSoft\DatBundle\Entity\Etiquetas $etiqueta
     * @return PruebasTecnicas
     */
    public function addEtiqueta(\IngSoft\DatBundle\Entity\Etiquetas $etiqueta)
    {
        $this->etiquetas[] = $etiqueta;
    
        return $this;
    }

    /**
     * Remove codigoEtiqueta
     *
     * @param \IngSoft\DatBundle\Entity\Etiquetas $etiqueta
     */
    public function removeEtiqueta(\IngSoft\DatBundle\Entity\Etiquetas $etiqueta)
    {
        $this->etiquetas->removeElement($etiqueta);
    }

    /**
     * Get codigoEtiqueta
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodigoEtiquetas()
    {
        return $this->etiquetas;
    }

    /**
     * Set codigoAdministrador
     *
     * @param \IngSoft\DatBundle\Entity\Administradores $administrador
     * @return PruebasTecnicas
     */
    public function setAdministrador(\IngSoft\DatBundle\Entity\Administradores $administrador = null)
    {
        $this->administrador = $administrador;
    
        return $this;
    }

    /**
     * Get codigoAdministrador
     *
     * @return \IngSoft\DatBundle\Entity\Administradores 
     */
    public function getAdministrador()
    {
        return $this->administrador;
    }

    /**
     * Set codigoCategoria
     *
     * @param \IngSoft\DatBundle\Entity\Categorias $categoria
     * @return PruebasTecnicas
     */
    public function setCategoria(\IngSoft\DatBundle\Entity\Categorias $categoria = null)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get codigoCategoria
     *
     * @return \IngSoft\DatBundle\Entity\Categorias 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
}