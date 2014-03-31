<?php

namespace IngSoft\DatBundle\Repository;

use Doctrine\ORM\EntityRepository;
use IngSoft\DatBundle\Entity\Contratos as Contratos;

/**
 * ContratoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContratoRepository extends EntityRepository
{
    /**
     * Permite crear un contrato nuevo en la base de datos, el codigo del contrato
     * no puede estar repetido
     * 
     * 
     * @param \IngSoft\DatBundle\Entity\Contratos $contrato
     *                                           contrato nuevo en la base de datos
     * 
     * 
     * @return true si el contrato se pudo agregar, false si no fue así
     * 
     */
    public function create(Contratos $contrato) {
        $em = $this->getEntityManager();
        $contratoU = $em->find($this->getEntityName(), $contrato->getCodigo());
        if (!$contratoU) {
            $em->persist($contrato);
            $em->flush();
            return true;
        }
        return false;
    }

     /**
     * Permite actualizar a un contrato que se encuentre en la base de datos
     * el contrato recibido tiene los atributos nuevos
     * 
     * 
     * @param \IngSoft\DatBundle\Entity\Contratos $contrato
     *                                           contrato con los datos nuevos
     * 
     * @return true si se pudo actualizar, false si no fue así
     */
    public function update(Contratos $contrato) {
        $em = $this->getEntityManager();
        $contratoU = $em->find($this->getEntityName(), $contrato->getCodigo());
        if ($contratoU) {
            $em->persist($contrato);
            $em->flush();
            return true;
        }
        return false;
    }

    /**
     * Permite buscar a un contrato según su cedula
     * 
     * 
     * @param type $codigo
     *        codigo del contrato que se quiere buscar
     * 
     * @return contrato encontrado
     * 
     */
    public function find($codigo) {
        $em = $this->getEntityManager();
        $contratoU = $em->find($this->getEntityManager(), $codigo);
        return $contratoU;
    }

    /**
     * Permite obtener todos los registros de los contratos
     * 
     * 
     * @return todos los contratos de la base de datos
     */
    public function getAll() {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT p FROM Contratos p");
        return $query->getResult();
    }

    /**
     * Permite borrar a un contrato según su cedula
     * 
     * 
     * @param type $codigo
     *             codigo del contrato que se quiere borrar
     * 
     * @return true si se puede borrar, false si no fue así
     */
    public function delete($codigo) {
        $em = $this->getEntityManager();
        $contratoU = $em->find($this->getEntityManager(), $codigo);
        if (!$contratoU) {
            $em->remove($contratoU);
            $em->flush();
            return true;
        }
        return false;
    }
}