<?php

namespace TunisiaMallBundle\Controller;

use TunisiaMallBundle\Entity\OffreEmploi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\TunisiaMallBundle;


class OffreEmploiController extends Controller
{

    public function ajoutAction(Request $request)
    {
        $offreEmploi = new Offreemploi();
        $form = $this->createForm('TunisiaMallBundle\Form\ajouterOffreForm', $offreEmploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offreEmploi);
            $em->flush();

            return $this->redirectToRoute('offreAdmin');
        }

        return $this->render('TunisiaMallBundle::offreAjoutAdmin.html.twig', array(
            'offreEmplois' => $offreEmploi,
            'form' => $form->createView(),
        ));
    }



    public function affichAllAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offreEmplois = $em->getRepository('TunisiaMallBundle:OffreEmploi')->findAll();

        return $this->render('TunisiaMallBundle::offreAdmin.html.twig', array(
            'offreEmplois' => $offreEmplois,
        ));
    }


    public function modifierAction(Request $request, $idOffre)
    {

        $em=$this->getDoctrine()->getManager();
        $offreEmploi=$em->getRepository("TunisiaMallBundle:OffreEmploi")->find($idOffre);
        $form=$this->createForm('TunisiaMallBundle\Form\ModifierOffreForm', $offreEmploi);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($offreEmploi);
            $em->flush();
            return $this->redirectToRoute('offreAdmin');

        }

        return $this->render('TunisiaMallBundle::offreModifAdmin.html.twig', array(
            "form"=>$form->createView()
        ));

    }

    public function supprimerAction($idOffre)
    {

      $em = $this->getDoctrine()->getManager();
        $offreEmploi = $em->getRepository("TunisiaMallBundle:OffreEmploi")->find($idOffre);
        $em->remove($offreEmploi);
        $em->flush();
        return $this->redirectToRoute('offreAdmin');

    }


    public function ToAjoutAction()
    {
        return $this->render('TunisiaMallBundle::offreAjoutAdmin.html.twig');
    }




}
