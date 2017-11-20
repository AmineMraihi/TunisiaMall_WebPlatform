<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 18/11/2017
 * Time: 15:50
 */

namespace TunisiaMallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\Entity\Publicite;
use TunisiaMallBundle\Form\AjoutPubliciteForm;
use TunisiaMallBundle\Form\ModifierPubliciteForm;


class PubliciteController extends Controller
{


    public function listpubAction()
    {

            $em=$this->getDoctrine()->getManager();
            $Produits=$em->getRepository("TunisiaMallBundle\\Entity\\Produit")->findAll();
            return $this->render("TunisiaMallBundle:Default:index.html.twig",array(
                "Produits" => $Produits
            ));
    }

    public function modifierpubAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $publicite=$em->getRepository("TunisiaMallBundle:Publicite")->find($id);
        $form=$this->createForm(ModifierPubliciteForm::class,$publicite);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($publicite);
            $em->flush();
            return $this->redirectToRoute('tunisia_mall_admin_publicite');
        }
        return $this->render("TunisiaMallBundle::modifierpublicite.html.twig",array(
            "formulaire"=>$form->createView()
        ));
    }

    public function supprimerpublicteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $publicite = $em->getRepository("TunisiaMallBundle:Publicite")->find($id);
        $em->remove($publicite);
        $em->flush();
        return $this->redirectToRoute('tunisia_mall_admin_publicite');

    }

    public function ajoutpubAction(Request $request)
    {
        $publicite=new Publicite();
        $form = $this->createForm(AjoutPubliciteForm::class,$publicite);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($publicite);
            $em->flush();
            return $this->redirectToRoute('tunisia_mall_admin_publicite');
        }
        return $this->render("TunisiaMallBundle::ajoutpublicite.html.twig",array(
            "formulaire"=>$form->createView()
        ));
    }
}