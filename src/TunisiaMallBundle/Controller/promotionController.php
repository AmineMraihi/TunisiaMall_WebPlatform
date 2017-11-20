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
    public function AjoutPromotionAction(Request $request)
    {
        $Promotion = new Promotion();

        $form = $this->createForm(AjoutPromotionForm::class, $Promotion);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Promotion);
            $em->flush();
            return $this->redirectToRoute("tunisia_mall_listProduit") ;

        }





        return $this->render('@TunisiaMall/promotion/promotiondeproduitx.html.twig', array(
            'formulaire' => $form->createView()
        ));
    }


    public function SuppppromotionAction($id_produit)
    {

        $em = $this->getDoctrine()->getManager();
        $produit= $em->getRepository("TunisiaMallBundle\\Entity\\Produit")->findOneBy(array('idProduit'=>$id_produit)) ;
        $em->remove($produit);
        $em->flush();

        return $this->redirectToRoute("tunisia_mall_listProduit") ;
    }
}