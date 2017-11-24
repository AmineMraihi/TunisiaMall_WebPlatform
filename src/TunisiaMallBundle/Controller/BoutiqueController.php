<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 16/11/2017
 * Time: 22:40
 */

namespace TunisiaMallBundle\Controller;




use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\Entity\Boutique;
use TunisiaMallBundle\Form\AjoutBoutiqueForm;
use TunisiaMallBundle\Form\ModifierBoutiqueForm;
use Symfony\Component\HttpFoundation\Response;
class BoutiqueController extends Controller
{
    public function ajoutboutiqueAction(Request $request)
    {
        $etat=0;
        $boutique=new Boutique();
        $form = $this->createForm(AjoutBoutiqueForm::class,$boutique);
        $form->handleRequest($request);
        if ($form->isValid() ) {
            if(($boutique->getDatecreation() < $boutique->getDateexpiration())){
            $em = $this->getDoctrine()->getManager();
            $em->persist($boutique);
            $em->flush();
        }else{$etat=-1;

            }}
        return $this->render("TunisiaMallBundle::ajoutboutique.html.twig",array("etat"=>$etat,
            'formulaire'=>$form->createView()
        ));
    }
    public function afficherboutiquesAction()
    {
        $em=$this->getDoctrine()->getManager();
        $boutiques=$em->getRepository("TunisiaMallBundle:Boutique")->findAll();
        return $this->render("TunisiaMallBundle::GestionBoutique.html.twig",array(
            "boutiques"=>$boutiques
        ));
    }
    public function supprimerboutiqueAction($id)
{
    $em = $this->getDoctrine()->getManager();
    $boutique = $em->getRepository("TunisiaMallBundle:Boutique")->find($id);
    $em->remove($boutique);
    $em->flush();
    return $this->redirectToRoute('tunisia_mall_list_boutique');
}
    public function modifierBoutiqueAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $boutique=$em->getRepository("TunisiaMallBundle:Boutique")->find($id);
        $form=$this->createForm(ModifierBoutiqueForm::class,$boutique);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($boutique);
            $em->flush();
        }

        return $this->render("TunisiaMallBundle::modifierboutique.html.twig",array(
            "form"=>$form->createView()
        ));

    }
    public function afficherboutiquesComboAction()
    {
        $em=$this->getDoctrine()->getManager();
        $boutiques=$em->getRepository("TunisiaMallBundle:Boutique")->findAll();
        return $this->render("TunisiaMallBundle::templateC.html.twig",array(
            "boutiques"=>$boutiques
        ));
    }
}