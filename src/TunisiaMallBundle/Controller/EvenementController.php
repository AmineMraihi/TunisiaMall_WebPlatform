<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 16/11/2017
 * Time: 10:32
 */

namespace TunisiaMallBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\Entity\Evenement;
use TunisiaMallBundle\Form\AjoutEvenementForm;
use TunisiaMallBundle\Form\ModifierEvenementForm;
use TunisiaMallBundle\TunisiaMallBundle;


class EvenementController extends Controller
{
    public function ajoutevenementAction(Request $request)
    {
        $evenement = new Evenement();
        $form = $this->createForm(AjoutEvenementForm::class, $evenement);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
            return $this->redirectToRoute('tunisia_mall_list_evenement');

        }
        return $this->render("TunisiaMallBundle:evenement:ajoutevenement.html.twig", array(
            "formulaire" => $form->createView()
        ));
    }

    public function exempleevenementAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository("TunisiaMallBundle:Evenement")->find($id);
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
        $boutiques=$em->getRepository("TunisiaMallBundle:Boutique")->findAll();

//        $form=$this->createForm(ModifierEvenementForm::class,$evenement);
//        $form->handleRequest($request);

//        if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($evenement);
        $em->flush();
//            return $this->redirectToRoute('tunisia_mall_list_evenement');

//        }

        return $this->render("TunisiaMallBundle::exempleevenement.html.twig", array(
            "evenement" => $evenement,   /*->createView()*/
            "publicites" => $publicites,
            "boutiques"=>$boutiques

        ));
    }

    public function listevenementAction()
    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository("TunisiaMallBundle:Evenement")->findAll();
        return $this->render("TunisiaMallBundle:evenement:evenement.html.twig", array(
            "evenements" => $evenements
        ));

    }

    public function modifierevenementAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository("TunisiaMallBundle:Evenement")->find($id);
        $form = $this->createForm(ModifierEvenementForm::class, $evenement);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
            return $this->redirectToRoute('tunisia_mall_list_evenement');

        }

        return $this->render("TunisiaMallBundle:evenement:modifierevenementemplate.html.twig", array(
            "form" => $form->createView()
        ));

    }

    public function supprimerevenementAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository("TunisiaMallBundle:Evenement")->find($id);
        $em->remove($evenement);
        $em->flush();
        return $this->redirectToRoute('tunisia_mall_list_evenement');
    }


}