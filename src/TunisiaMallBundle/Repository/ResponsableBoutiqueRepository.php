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
    function findbyrole($role){
        $query=$this->getEntityManager()
            ->createQuery('select v from TunisiaMallBundle:User v where v.roles=:role ')
            ->setParameter('role',$role);
        return $query->getResult();
    }
}