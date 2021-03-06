<?php

namespace IngSoft\DatBundle\Repository;

use Doctrine\ORM\EntityRepository;
use IngSoft\DatBundle\Entity\Usuarios as Usuarios;

/**
 * UsuarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuarioRepository extends EntityRepository {

    
    
    /**
     * Permite crear un usuario nuevo en la base de datos, la cedula del usuario
     * no puede estar repetida
     * 
     * 
     * @param \IngSoft\DatBundle\Entity\Usuarios $usuario
     *                                           usuario nuevo en la base de datos
     * 
     * 
     * @return true si el usuario se pudo agregar, false si no fue así
     * 
     */
    public function create(Usuarios $usuario) {
        $em = $this->getEntityManager();
        $usuarioU = $em->find($this->getEntityName(), $usuario->getCedula());
        if (!$usuarioU) {
            $em->persist($usuario);
            $em->flush();
            return true;
        }
        return false;
    }

    
    /**
     * Permite actualizar a un usuario que se encuentre en la base de datos
     * el usuario recibido tiene los atributos nuevos
     * 
     * 
     * @param \IngSoft\DatBundle\Entity\Usuarios $usuario
     *                                           usuario con los datos nuevos
     * 
     * @return true si se pudo actualizar, false si no fue así
     */
    public function update(Usuarios $usuario) {
        $em = $this->getEntityManager();
        $usuarioU = $em->find($this->getEntityName(), $usuario->getCedula());
        if ($usuarioU) {
            $em->persist($usuario);
            $em->flush();
            return true;
        }
        return false;
    }

    
    
    /**
     * Permite buscar a un usuario según su cedula
     * 
     * 
     * @param type $cedula
     *        cedula del usuario que se quiere buscar
     * 
     * @return usuario encontrado
     * 
     */
    public function find($cedula) {
        $em = $this->getEntityManager();
        $usuarioU = $em->find($this->getEntityManager(), $cedula);
        return $usuarioU;
    }

    
    /**
     * Permite obtener todos los registros de los usuarios
     * 
     * 
     * @return todos los usuarios de la base de datos
     */
    public function getAll() {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT p FROM Usuarios p");
        return $query->getResult();
    }

    
    
    /**
     * Permite borrar a un usuario según su cedula
     * 
     * 
     * @param type $cedula
     *             cedula del usuario que se quiere borrar
     * 
     * @return boolean true si se puede borrar, false si no fue así
     */
    public function delete($cedula) {
        $em = $this->getEntityManager();
        $usuarioU = $em->find($this->getEntityManager(), $cedula);
        if (!$usuarioU) {
            $em->remove($usuarioU);
            $em->flush();
            return true;
        }
        return false;
    }

    
    /**
     * Permite obtener la calificación actual de un usuario, es decir
     * la categoria donde se encuentra
     * 
     * 
     * @param type $cedula
     *             cedula del usuario del que se quiere obtener la calificación
     * 
     * @return calificación del usuario
     */
    
    public function obtenerCalificacionActualUsuario($cedula) {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT c FROM CalificacionesPrestadores cp 
            JOIN cp.prestador p JOIN cp.calificacion c WHERE cp.actual='true'
            AND p.cedula=:cedula AND p.");
        $query->setParameter('cedula', $cedula);
        
        return $query->getSingleResult();
    }
    
    /**
     * Consulta que permite obtener los mejores calificadores de servicio
     * en cierto rango, se hace con la finalidad de no retornar todos los 
     * calificadores de servicio en una sola consulta y así alivianar
     * la carga de objetos del aplicativo. El rango se recomienda ser menor
     * de 50. La intención de colocar el tipo como parametro radica en que hace
     * más modificable el código a futuro. 
     * 
     * 
     * 
     * @param type $comienzo
     *             comienzo del ranking de prestadores de servicio
     * 
     * @param type $fin
     *             fin del ranking de prestadores de servicio
     * 
     * @param type $tipo
     *             cadena que trae el tipo de usuario del prestador de servicio
     * 
     * @return un rango con los prestadores de servicio establecidos
     * 
     */
    public function sugerirPrestadoresMayorCalificacion($comienzo, $fin, $tipo) {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT p FROM CalificacionesPrestadores cp 
            JOIN cp.prestador p JOIN cp.calificacion c JOIN p.tipo t WHERE 
            cp.actual='true' AND t.nombre=:nombre ORDER BY c.puntajeAdquicision ASC");
        $query->setParameter('nombtre', $tipo);
        $query->setFirstResult($comienzo);
        $query->setMaxResults($fin);
        return $query->getResult();
    }

}
