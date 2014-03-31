<?php

namespace IngSoft\DatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity(repositoryClass="IngSoft\DatBundle\Repository\UsuarioRepository")
 */
class Usuarios
{
    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
     */
    private $nombre;

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
     * @ORM\Column(name="telefono_domicilio", type="string", length=20, nullable=false)
     */
    private $telefonoDomicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_celular", type="string", length=20, nullable=false)
     */
    private $telefonoCelular;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", length=60, nullable=false)
     */
    private $correoElectronico;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inscripcion", type="datetime", nullable=false)
     */
    private $fechaInscripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="perfil_activo", type="boolean", nullable=false)
     */
    private $perfilActivo;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasenia", type="string", length=30, nullable=false)
     */
    private $contrasenia;

    /**
     * @var integer
     *
     * @ORM\Column(name="codigo_perfil", type="integer", nullable=false)
     */
    private $codigoPerfil;

    /**
     * @var boolean
     *
     * @ORM\Column(name="eliminado", type="boolean", nullable=false)
     */
    private $eliminado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Actividades", inversedBy="codigoPrestador")
     * @ORM\JoinTable(name="prestadores_actividades",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codigo_prestador", referencedColumnName="cedula")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="codigo_actividad", referencedColumnName="codigo")
     *   }
     * )
     */
    private $actividadesPrestador;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Proyectos", mappedBy="codigoPrestador")
     */
    private $proyectos;

    /**
     * @var \TiposUsuario
     *
     * @ORM\ManyToOne(targetEntity="TiposUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_tipo", referencedColumnName="codigo")
     * })
     */
    private $tipo;

    /**
     * @var \Barrios
     *
     * @ORM\ManyToOne(targetEntity="Barrios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_barrio", referencedColumnName="codigo")
     * })
     */
    private $barrio;

    function __construct($cedula, $nombre, $correo, 
            $direccion, $telefonoDomicilio, $telefonoCelular, 
            $correoElectronico, \DateTime $fechaInscripcion, 
            $perfilActivo, $contrasenia, $codigoPerfil, $eliminado, 
            \Doctrine\Common\Collections\Collection $actividadesPrestador, 
            \Doctrine\Common\Collections\Collection $proyectos, 
            \TiposUsuario $tipo, \Barrios $barrio) {
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->telefonoDomicilio = $telefonoDomicilio;
        $this->telefonoCelular = $telefonoCelular;
        $this->correoElectronico = $correoElectronico;
        $this->fechaInscripcion = $fechaInscripcion;
        $this->perfilActivo = $perfilActivo;
        $this->contrasenia = $contrasenia;
        $this->codigoPerfil = $codigoPerfil;
        $this->eliminado = $eliminado;
        $this->actividadesPrestador = $actividadesPrestador;
        $this->proyectos = $proyectos;
        $this->tipo = $tipo;
        $this->barrio = $barrio;
    }

    

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuarios
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
     * Set correo
     *
     * @param string $correo
     * @return Usuarios
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
     * @return Usuarios
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
     * Set telefonoDomicilio
     *
     * @param string $telefonoDomicilio
     * @return Usuarios
     */
    public function setTelefonoDomicilio($telefonoDomicilio)
    {
        $this->telefonoDomicilio = $telefonoDomicilio;
    
        return $this;
    }

    /**
     * Get telefonoDomicilio
     *
     * @return string 
     */
    public function getTelefonoDomicilio()
    {
        return $this->telefonoDomicilio;
    }

    /**
     * Set telefonoCelular
     *
     * @param string $telefonoCelular
     * @return Usuarios
     */
    public function setTelefonoCelular($telefonoCelular)
    {
        $this->telefonoCelular = $telefonoCelular;
    
        return $this;
    }

    /**
     * Get telefonoCelular
     *
     * @return string 
     */
    public function getTelefonoCelular()
    {
        return $this->telefonoCelular;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     * @return Usuarios
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
     * Set fechaInscripcion
     *
     * @param \DateTime $fechaInscripcion
     * @return Usuarios
     */
    public function setFechaInscripcion($fechaInscripcion)
    {
        $this->fechaInscripcion = $fechaInscripcion;
    
        return $this;
    }

    /**
     * Get fechaInscripcion
     *
     * @return \DateTime 
     */
    public function getFechaInscripcion()
    {
        return $this->fechaInscripcion;
    }

    /**
     * Set perfilActivo
     *
     * @param boolean $perfilActivo
     * @return Usuarios
     */
    public function setPerfilActivo($perfilActivo)
    {
        $this->perfilActivo = $perfilActivo;
    
        return $this;
    }

    /**
     * Get perfilActivo
     *
     * @return boolean 
     */
    public function getPerfilActivo()
    {
        return $this->perfilActivo;
    }

    /**
     * Set contrasenia
     *
     * @param string $contrasenia
     * @return Usuarios
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

    /**
     * Set codigoPerfil
     *
     * @param integer $codigoPerfil
     * @return Usuarios
     */
    public function setCodigoPerfil($codigoPerfil)
    {
        $this->codigoPerfil = $codigoPerfil;
    
        return $this;
    }

    /**
     * Get codigoPerfil
     *
     * @return integer 
     */
    public function getCodigoPerfil()
    {
        return $this->codigoPerfil;
    }

    /**
     * Set eliminado
     *
     * @param boolean $eliminado
     * @return Usuarios
     */
    public function setEliminado($eliminado)
    {
        $this->eliminado = $eliminado;
    
        return $this;
    }

    /**
     * Get eliminado
     *
     * @return boolean 
     */
    public function getEliminado()
    {
        return $this->eliminado;
    }

    /**
     * Add codigoActividad
     *
     * @param \IngSoft\DatBundle\Entity\Actividades $actividad
     * @return Usuarios
     */
    public function addActividadPrestador(\IngSoft\DatBundle\Entity\Actividades $actividad)
    {
        $this->actividadesPrestador[] = $actividad;
    
        return $this;
    }

    /**
     * Remove codigoActividad
     *
     * @param \IngSoft\DatBundle\Entity\Actividades $actividad
     */
    public function removeActividadPrestador(\IngSoft\DatBundle\Entity\Actividades $actividad)
    {
        $this->actividadesPrestador->removeElement($actividad);
    }

    /**
     * Get codigoActividad
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActividadesPrestador()
    {
        return $this->actividadesPrestador;
    }

    /**
     * Add codigoProyecto
     *
     * @param \IngSoft\DatBundle\Entity\Proyectos $proyecto
     * @return Usuarios
     */
    public function addProyecto(\IngSoft\DatBundle\Entity\Proyectos $proyecto)
    {
        $this->proyectos[] = $proyecto;
    
        return $this;
    }

    /**
     * Remove codigoProyecto
     *
     * @param \IngSoft\DatBundle\Entity\Proyectos $proyecto
     */
    public function removeProyecto(\IngSoft\DatBundle\Entity\Proyectos $proyecto)
    {
        $this->proyectos->removeElement($proyecto);
    }

    /**
     * Get codigoProyecto
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProyectos()
    {
        return $this->proyectos;
    }

    /**
     * Set codigoTipo
     *
     * @param \IngSoft\DatBundle\Entity\TiposUsuario $tipo
     * @return Usuarios
     */
    public function setTipo(\IngSoft\DatBundle\Entity\TiposUsuario $tipo = null)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get codigoTipo
     *
     * @return \IngSoft\DatBundle\Entity\TiposUsuario 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set codigoBarrio
     *
     * @param \IngSoft\DatBundle\Entity\Barrios $codigoBarrio
     * @return Usuarios
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