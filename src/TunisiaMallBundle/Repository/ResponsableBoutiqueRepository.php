<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 21/11/2017
 * Time: 18:16
 */

namespace TunisiaMallBundle\Repository;

use Doctrine\ORM\EntityRepository;


class ResponsableBoutiqueRepository extends EntityRepository
{
    function findbyrole($role)
    {
        $query = $this->getEntityManager()
            ->createQuery('select v from TunisiaMallBundle:User v where v.roles=:role ')
            ->setParameter('role', $role);
        return $query->getResult();
    }

    function findQb()
    {
        $query = $this->getEntityManager()->createQuery("select m from TunisiaMallBundle:DemandePub ");
        return $query->getResult();
    }

    function returnemptyboutique()
    {
        $query = $this->getEntityManager()
            ->createQuery("
            SELECT b.nom FROM TunisiaMallBundle:User u inner join TunisiaMallBundle:boutique b where u.idBoutique=b.idBoutique
            ");
        return $query->getResult();
    }
}