<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 19/11/2017
 * Time: 19:03
 */

namespace TunisiaMallBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\Entity\Evenement;
use TunisiaMallBundle\Form\AjoutEvenementForm;
use TunisiaMallBundle\Form\AjoutevenementShopownerForm;
use TunisiaMallBundle\Form\ModifierEvenementForm;
use TunisiaMallBundle\Form\ModifierEvenementShopownerForm;
use TunisiaMallBundle\TunisiaMallBundle;

class EvenementShopownerController extends Controller
{


    public function ajouterevenementAction(Request $request)
    {
        $evenement=new Evenement();
        $form = $this->createForm(AjoutevenementShopownerForm::class,$evenement);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
            return $this->redirectToRoute('tunisia_mall_shopowner_list_evenement');

        }
        return $this->render("TunisiaMallBundle:evenement:shopownerajoutevenement.html.twig",array(
            "formulaire"=>$form->createView()
        ));
    }

    public function listevenementAction()
    {
        $em=$this->getDoctrine()->getManager();
        $evenements=$em->getRepository("TunisiaMallBundle:Evenement")->findAll();
        return $this->render("TunisiaMallBundle:evenement:shopownerevenement.html.twig",array(
            "evenements"=>$evenements
        ));
    }

    public function modifierevenementAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $evenement=$em->getRepository("TunisiaMallBundle:Evenement")->find($id);
        $form=$this->createForm(ModifierEvenementShopownerForm::class,$evenement);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
            return $this->redirectToRoute('tunisia_mall_shopowner_list_evenement');

        }

        return $this->render("TunisiaMallBundle:evenement:shopownermodifierevenement.html.twig",array(
            "form"=>$form->createView()
        ));
    }

    public function supprimerevenementAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository("TunisiaMallBundle:Evenement")->find($id);
        $em->remove($evenement);
        $em->flush();
        return $this->redirectToRoute('tunisia_mall_shopowner_list_evenement');
    }
}