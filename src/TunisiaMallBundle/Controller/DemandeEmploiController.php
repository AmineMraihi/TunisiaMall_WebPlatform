<?php
/**
 * Created by PhpStorm.
 * User: bn
 * Date: 19/11/2017
 * Time: 14:21
 */

namespace TunisiaMallBundle\Controller;

use TunisiaMallBundle\Entity\DemandeEmploi;
use TunisiaMallBundle\Entity\Boutique;
use TunisiaMallBundle\Entity\OffreEmploi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\TunisiaMallBundle;


class DemandeEmploiController extends Controller
{

    public function afficherOffreAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offreEmplois = $em->getRepository('TunisiaMallBundle:OffreEmploi')->findAll();
        $evenements = $em->getRepository("TunisiaMallBundle:Evenement")->findAll();
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
        $produits = $em->getRepository("TunisiaMallBundle:Produit")->findAll();
        $boutiques=$em->getRepository("TunisiaMallBundle:Boutique")->findAll();
        return $this->render('TunisiaMallBundle::offreClient.html.twig', array(
            'offreEmplois' => $offreEmplois,
            "evenements" => $evenements,
            "publicites" => $publicites,
            "produits" => $produits,
            "boutiques" =>$boutiques

        ));

    }

    public function ajouterDemandeAction(Request $request,$idOffre)
    {

        $demandeEmploi = new DemandeEmploi();

        $demandeEmploi->setIdUserFk($user=$this->getUser()->getId());
        $demandeEmploi->setNomEmp($user=$this->getUser()->getNom());
        $demandeEmploi->setPrenomEmp($user=$this->getUser()->getPrenom());
        $demandeEmploi->setDateNaissance($user=$this->getUser()->getDateNaissance());
        $demandeEmploi->setAdresse($user=$this->getUser()->getAdresse());
        $demandeEmploi->setSexe($user=$this->getUser()->getSexe());
        $demandeEmploi->setEmail($user=$this->getUser()->getEmail());
        $demandeEmploi->setNumTel($user=$this->getUser()->getNumeroTelephone());

        $em = $this->getDoctrine()->getManager();

        $offreemploi=$em->getRepository('TunisiaMallBundle\Entity\OffreEmploi')->find($idOffre);
        $demandeEmploi->setOffre($offreemploi);
        $evenements = $em->getRepository("TunisiaMallBundle:Evenement")->findAll();
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
        $produits = $em->getRepository("TunisiaMallBundle:Produit")->findAll();

       $date= $offreemploi->getDateExpiration();
     // var_dump($date);
        $time=new\DateTime("now");


if ($date > $time )
       {
           $form = $this->createForm('TunisiaMallBundle\Form\ajouterDemandeForm', $demandeEmploi);
           $form->handleRequest($request);

           if ($form->isSubmitted() && $form->isValid()) {

               $em = $this->getDoctrine()->getManager();

               $em->persist($demandeEmploi);
               $em->flush();

               return $this->redirectToRoute('demandelist');

           }

           return $this->render('TunisiaMallBundle::demandeajoutclient.html.twig', array(
               'demandeEmplois' => $demandeEmploi,
               'form' => $form->createView(),
               "evenements" => $evenements,
               "publicites" => $publicites,
               "produits" => $produits

           ));
       }

       else { /*$message='Date déjà passée';

                 echo "<script type='text/javascript'>window.alert('$message');</script>";
           $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
           return $this->render('TunisiaMallBundle:Default:index.html.twig',array(

               "publicites" => $publicites,
               "produits" => $produits

           ));*/
            }

       return $this->redirectToRoute('offreclient');

 }



    public function affichAlladminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandeEmploi = $em->getRepository('TunisiaMallBundle:DemandeEmploi')->findAll();
        $evenements = $em->getRepository("TunisiaMallBundle:Evenement")->findAll();
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
        $produits = $em->getRepository("TunisiaMallBundle:Produit")->findAll();
        return $this->render('TunisiaMallBundle::demandeAdmin.html.twig', array(
            'demandeEmplois' => $demandeEmploi,
            "evenements" => $evenements,
            "publicites" => $publicites,
            "produits" => $produits
        ));
    }


    public function affichAllclientAction()
    {
        $em = $this->getDoctrine()->getManager();

        $id=$this->getUser()->getId();
      //  $demandeEmploi = $em->getRepository('TunisiaMallBundle:DemandeEmploi')->findBy(['IdOffre'=>$idOffre]);
        $demandeEmploi = $em->getRepository('TunisiaMallBundle:DemandeEmploi')->findBy(['IdUserFk'=>$id]);
        $evenements = $em->getRepository("TunisiaMallBundle:Evenement")->findAll();
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
        $produits = $em->getRepository("TunisiaMallBundle:Produit")->findAll();
        /*['idDemande'=>$demandeEmploi]*/
        //var_dump($demandeEmploi);
      return $this->render('TunisiaMallBundle::demandelistclient.html.twig', array(
            'demandeEmplois' => $demandeEmploi,
          "evenements" => $evenements,
          "publicites" => $publicites,
          "produits" => $produits
        ));
    }

    public function modifierAction(Request $request, DemandeEmploi $demandeEmploi)
    {
        $em = $this->getDoctrine()->getManager();
        $Form_edit = $this->createForm('TunisiaMallBundle\Form\ajouterDemandeForm', $demandeEmploi);
        $Form_edit->handleRequest($request);
        $evenements = $em->getRepository("TunisiaMallBundle:Evenement")->findAll();
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
        $produits = $em->getRepository("TunisiaMallBundle:Produit")->findAll();

        if ($Form_edit->isSubmitted() && $Form_edit->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demandelist');
        }

        return $this->render('TunisiaMallBundle::demandemodif.html.twig', array(
            'demandeEmploi' => $demandeEmploi,
            'edit_form' => $Form_edit->createView(),
            "evenements" => $evenements,
            "publicites" => $publicites,
            "produits" => $produits

        ));
    }


    public function supprimerAction(DemandeEmploi $demandeEmploi)
    {
        $em=$this->getDoctrine()->getManager();
        $demandeEmploi=$em->getRepository("TunisiaMallBundle:DemandeEmploi")->find($demandeEmploi->getIdDemande());
        $em->remove($demandeEmploi);
        $em->flush();
        return $this->redirectToRoute("demandelist");
    }

/************************** Shop pwner ***********************/

    public function affichShopownerDemandeAction()
    {

        $em = $this->getDoctrine()->getManager();
        $boutique= new Boutique();
       // $offreEmploi= new OffreEmploi();

        $boutique->setIdBoutique($user=$this->getUser()->getIdBoutique());

        $offreEmploi = $em->getRepository('TunisiaMallBundle:OffreEmploi')->findBy(['Boutique'=>$boutique->getIdBoutique()]);

        // var_dump($offreEmploi);
        //$offreEmploi->setBoutique($boutique);

       $demandeEmploi = $em->getRepository('TunisiaMallBundle:DemandeEmploi')->findBy(['Offre'=>$offreEmploi]);

     //   $demandeEmploi->setOffre($offreEmploi);
 //  var_dump($demandeEmploi);
        return $this->render('TunisiaMallBundle::demandeshopowner.html.twig', array(
            'demandeEmplois' => $demandeEmploi,
        ));

    }


}