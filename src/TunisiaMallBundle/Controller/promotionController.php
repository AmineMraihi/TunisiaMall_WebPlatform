<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 11/18/2017
 * Time: 3:50 PM
 */

namespace TunisiaMallBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TunisiaMallBundle\Form\AjoutPromotionForm;
use TunisiaMallBundle\Entity\Promotion;
use TunisiaMallBundle\Form\modifierproditForm;
use TunisiaMallBundle\Form\ModifierPromotion;

class promotionController extends Controller
{
    public function promoproduitxAction(){

        return $this->render("@TunisiaMall/promotion/promotiondeproduitx.html.twig");


    }

    public function promoproduittotalAction(){

        $em=$this->getDoctrine()->getManager();
        $Promotions=$em->getRepository("TunisiaMallBundle\\Entity\\Promotion")->findAll();

        return $this->render("@TunisiaMall/promotion/listepromotion.html.twig",
            array("Promotions" => $Promotions));

    }
    public function AjoutPromotionAction($id_produit,Request $request)
    {



        $em=$this->getDoctrine()->getManager() ;

        $promotion = new promotion();
        $Form =$this->createForm(AjoutPromotionForm::class, $promotion) ;
        $Form->handleRequest($request) ;
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($promotion) ;
            $em->flush() ;
            return $this->redirectToRoute("tunisia_mall_listProduit") ; }
        return $this->render('TunisiaMallBundle:promotion:promotiondeproduitx.html.twig', array('formulaire'=>$Form->createView())) ;

 }
    public function modifierPromotionAction($idPromotion, Request $request)
    {
        $em=$this->getDoctrine()->getManager() ;
        $promotion= $em->getRepository("TunisiaMallBundle\\Entity\\Promotion")->findOneBy(array('idPromotion'=>$idPromotion)) ;

        $Form =$this->createForm(ModifierPromotion::class, $promotion) ;
        $Form->handleRequest($request) ;
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($promotion) ;
            $em->flush() ;
            return $this->redirectToRoute("tunisia_mall_promoproduittotal"); }

        return $this->render('TunisiaMallBundle:promotion:modifierpromotion.html.twig', array('formulaire'=>$Form->createView())) ;
    }



    public function SupppromotionAction($id_promotion)
    {

        $em = $this->getDoctrine()->getManager();
        $promotion= $em->getRepository("TunisiaMallBundle\\Entity\\Promotion")->findOneBy(array('idPromotion'=>$id_promotion)) ;
        $em->remove($promotion);
        $em->flush();

        return $this->redirectToRoute("tunisia_mall_promoproduittotal") ;
    }
}