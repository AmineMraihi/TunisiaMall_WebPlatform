<?php

namespace TunisiaMallBundle\Controller;

use TunisiaMallBundle\Entity\Boutique;
use TunisiaMallBundle\Entity\DemandeEmploi;
use TunisiaMallBundle\Entity\OffreEmploi;
use TunisiaMallBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TunisiaMallBundle\TunisiaMallBundle;


class OffreEmploiController extends Controller
{

    public function ajoutAction(Request $request)
    {
        $offreEmploi = new Offreemploi();
        $offreEmploi->setIdUserFk($user=$this->getUser()->getId());

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


    public function affichdetailClientAction($idOffre)
    {
        $em = $this->getDoctrine()->getManager();

        $offreEmploi = $em->getRepository('TunisiaMallBundle:OffreEmploi')->find($idOffre);
        $evenements = $em->getRepository("TunisiaMallBundle:Evenement")->findAll();
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
        $produits = $em->getRepository("TunisiaMallBundle:Produit")->findAll();
//var_dump($offreEmplois);

  $boutique =$em->getRepository('TunisiaMallBundle:Boutique')->findBy(['idBoutique'=>$offreEmploi->getBoutique()]);
//var_dump($offreEmploi);
//var_dump($boutique);
    return $this->render('TunisiaMallBundle::offredetailClient.html.twig', array(
            'offreEmplois' => $offreEmploi,'boutique'=>$boutique,
        "evenements" => $evenements,
        "publicites" => $publicites,
        "produits" => $produits
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


      $em2 = $this->getDoctrine()->getManager();

  /*      $em = $this->getDoctrine()->getManager();

    $demandeEmploi= new DemandeEmploi();

        $offreEmploi = $em->getRepository("TunisiaMallBundle:OffreEmploi")->find($idOffre);

      $demandeEmploi->setOffre($offreEmploi);

if ($offreEmploi!=NULL){
        $demandeEmploi = $em->getRepository("TunisiaMallBundle:DemandeEmploi")->findBy(['Offre'=>$offreEmploi]);


if ($demandeEmploi!=NULL) {
    $em->remove($offreEmploi);
    $em->remove($demandeEmploi);


}}
        return $this->redirectToRoute('offreAdmin');
*/


    }


    public function ToAjoutAction()
    {
        return $this->render('TunisiaMallBundle::offreAjoutAdmin.html.twig');
    }

/**************************************  Shop owner  ****************************************/


    public function affichShopownerAction()
    {
        $em = $this->getDoctrine()->getManager();

        $boutique= new Boutique();
        $boutique->setIdBoutique($user=$this->getUser()->getIdBoutique());
//var_dump($boutique);

        $offreEmplois = $em->getRepository('TunisiaMallBundle:OffreEmploi')->findBy(['Boutique'=>$boutique->getIdBoutique()]);

        return $this->render('TunisiaMallBundle::offreshopowner.html.twig', array(
            'offreEmplois' => $offreEmplois,
        ));

    }


    public function ajoutShopownerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $boutique = $em->getRepository('TunisiaMallBundle:Boutique')->find($user=$this->getUser()->getIdBoutique());
 //var_dump($boutique);
        $offreEmploi = new Offreemploi();

        $offreEmploi->setIdUserFk($user=$this->getUser()->getId());

        $offreEmploi->setBoutique($boutique);

        $form = $this->createForm('TunisiaMallBundle\Form\ajouterOffreShopownerForm', $offreEmploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())

        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offreEmploi);
            $em->flush();

            return $this->redirectToRoute('affichShopowner');
        }

        return $this->render('TunisiaMallBundle::offreAjoutShopowner.html.twig', array(
            'offreEmplois' => $offreEmploi,
            'form' => $form->createView(),
        ));
    }

    public function supprimerShopAction($idOffre)
    {

        $em = $this->getDoctrine()->getManager();
        $offreEmploi = $em->getRepository("TunisiaMallBundle:OffreEmploi")->find($idOffre);
        $em->remove($offreEmploi);
        $em->flush();
        return $this->redirectToRoute('affichShopowner');

    }


    public function modifierShopAction(Request $request, $idOffre)
    {

        $em=$this->getDoctrine()->getManager();
        $offreEmploi=$em->getRepository("TunisiaMallBundle:OffreEmploi")->find($idOffre);
        $form=$this->createForm('TunisiaMallBundle\Form\ajouterOffreShopownerForm', $offreEmploi);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($offreEmploi);
            $em->flush();
            return $this->redirectToRoute('affichShopowner');

        }

        return $this->render('TunisiaMallBundle::offreModifShopowner.html.twig', array(
            "form"=>$form->createView()
        ));

    }


}
