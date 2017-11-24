<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 11/17/2017
 * Time: 1:28 AM
 */

namespace TunisiaMallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TunisiaMallBundle\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\Form\AjoutProduitForum;
use TunisiaMallBundle\Form\modifierproditForm;



class ProduitController extends Controller
{


    public function listProduitAction(){
        $em=$this->getDoctrine()->getManager();
        $Produits=$em->getRepository("TunisiaMallBundle\\Entity\\Produit")->findAll();
        return $this->render("@TunisiaMall/produit/listeProduit.html.twig",array(
            "Produits" => $Produits
        ));
    }



    public function SuppprodAction($id_produit)
    {

        $em = $this->getDoctrine()->getManager();
        $produit= $em->getRepository("TunisiaMallBundle\\Entity\\Produit")->findOneBy(array('idProduit'=>$id_produit)) ;
        $em->remove($produit);
        $em->flush();

        return $this->redirectToRoute("tunisia_mall_listProduit") ;
    }

    public function chatAction(){

        return $this->render("@TunisiaMall/Default/chat.html.twig");

    }

    public function shopAction(){

        return $this->render("@TunisiaMall/shop/templateshopowner.html.twig");

    }

    public function modifierProduitAction($id_produit, Request $request)
    {
        $em=$this->getDoctrine()->getManager() ;
        $produit= $em->getRepository("TunisiaMallBundle\\Entity\\Produit")->findOneBy(array('idProduit'=>$id_produit )) ;

        $Form =$this->createForm(modifierproditForm::class, $produit) ;
        $Form->handleRequest($request) ;
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($produit) ;
            $em->flush() ;
        return $this->redirectToRoute("tunisia_mall_listProduit"); }

               return $this->render('TunisiaMallBundle:produit:modifierProduit.html.twig', array('formulaire'=>$Form->createView())) ;
    }

    public function AjoutProduitAction(Request $request)
    {
        $Produit = new Produit();

        $form = $this->createForm(AjoutProduitForum::class, $Produit);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Produit);
            $em->flush();
            return $this->redirectToRoute("tunisia_mall_listProduit") ;

        }

        return $this->render('@TunisiaMall/produit/NewProduit.html.twig', array(
            'formulaire' => $form->createView()
        ));
    }





    public function affichageclothesAction()
    {


        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository("TunisiaMallBundle:Produit")->findBy(array('type'=>"Clothes"));



        return $this->render("TunisiaMallBundle:produit:affichageclient.html.twig", array(

            "produits" => $produits   )) ;

    }


    public function affichagewatchAction()
    {


        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository("TunisiaMallBundle:Produit")->findBy(array('type'=>"watch"));



        return $this->render("TunisiaMallBundle:produit:affichageclient.html.twig", array(

            "produits" => $produits   )) ;

    }

    public function exemplprodyAction($id)
    {
        $em = $this->getDoctrine()->getManager();


        $produit = $em->getRepository("TunisiaMallBundle:Produit")->find($id);
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();

        $em = $this->getDoctrine()->getManager();
        $em->persist($produit);


        $em->flush();

        return $this->render("TunisiaMallBundle:produit:afficheprodY.html.twig", array(
            "produit" => $produit,


            "publicites" => $publicites


        ));
    }



}