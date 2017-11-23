<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 21/11/2017
 * Time: 22:13
 */

namespace TunisiaMallBundle\Repository;
use Doctrine\ORM\EntityRepository;

class ReclamationRepository extends EntityRepository
{
public function RemplirReclamation()
{
    $query=$this
        ->createQueryBuilder('type','text','email','username')
        ->from ('TunisiaMallBundle:Reclamation','r')
        ->INNERJOIN ('r.user','u')

        ;
    return $query->getQuery()->getResult();
}
public function findByidPReclame($user)
{
    $query=$this->getEntityManager()
        ->createQuery("
        select r from TunisiaMallBundle:Reclamation r where r.idPReclame=:id
        ")
        ->setParameter('id',$user);
    return $query->getResult();
}


}