<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 21/11/2017
 * Time: 17:42
 */

namespace TunisiaMallBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\Entity\User;
use TunisiaMallBundle\Form\AjoutResponsableBoutiqueForm;
use TunisiaMallBundle\Form\ModifierResponsableBoutiqueForm;

class UserController extends Controller
{
    public function listeresponsableboutiqueAction()
    {
        $em = $this->getDoctrine()->getManager();
        $responsables = $em->getRepository("TunisiaMallBundle:User")->findAll();
        return $this->render("TunisiaMallBundle:responsable:responsableboutique.html.twig", array(
            "responsables" => $responsables
        ));
    }


    public function ajoutresponsableboutiqueAction(Request $request)
    {
        $em1 = $this->getDoctrine()->getManager();
        $emptyboutiques = $em1->getRepository("TunisiaMallBundle:User")->returnemptyboutique();
        $user = new User();
        $form = $this->createForm(AjoutResponsableBoutiqueForm::class, $user);
        $form->handleRequest($request);
        $user->setRoles(array('ROLE_RESPONSABLE'));
        $user->setEnabled(true);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('tunisia_mall_admin_liste_responsable_boutique');
        }
        return $this->render("TunisiaMallBundle:responsable:ajoutresponsableboutique.html.twig", array(
            "formulaire" => $form->createView(),
            "emptyboutiques" => $emptyboutiques
        ));
    }

    public function modifierresponsableAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("TunisiaMallBundle:User")->find($id);
        $form = $this->createForm(ModifierResponsableBoutiqueForm::class, $user);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('tunisia_mall_admin_liste_responsable_boutique');
        }
        return $this->render("TunisiaMallBundle:responsable:modifierresponsableboutique.html.twig", array(
            "formulaire" => $form->createView()
        ));
    }

    public function supprimerresponsableAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("TunisiaMallBundle:User")->find($id);
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('tunisia_mall_admin_liste_responsable_boutique');
    }
}