<?php
/**
 * Created by PhpStorm.
 * User: bn
 * Date: 24/11/2017
 * Time: 05:32
 */

namespace TunisiaMallBundle\Repository;
use Doctrine\ORM\EntityRepository;

class StatRepository extends EntityRepository
{
    public function findByidBoutique($idboutique)
    {
          $query=$this->getEntityManager()
            ->createQuery("
        select r from TunisiaMallBundle:Produit r where r.idBoutique=:id ")
            ->setParameter('id',"$idboutique");
        return $query->getResult();
    }

    public function CountSexe()
    {
          $query=$this->getEntityManager()
            ->createQuery(' select r,COUNT (r) from TunisiaMallBundle:DemandeEmploi r GROUP BY r.sexe');

        return $query->getResult();
    }
}