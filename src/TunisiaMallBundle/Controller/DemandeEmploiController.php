<?php
/**
 * Created by PhpStorm.
 * User: bn
 * Date: 19/11/2017
 * Time: 14:21
 */

namespace TunisiaMallBundle\Controller;

use TunisiaMallBundle\Entity\DemandeEmploi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\TunisiaMallBundle;


class DemandeEmploiController extends Controller
{
    public function afficherAllAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandeEmploi = $em->getRepository('TunisiaMallBundle:DemandeEmploi')->findAll();

        return $this->render('TunisiaMallBundle::demandeAdmin.html.twig', array(
            'demandeEmplois' => $demandeEmploi,
        ));
    }
}