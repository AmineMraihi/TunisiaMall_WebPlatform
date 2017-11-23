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
use Symfony\Component\Validator\Constraints\DateTime;
use TunisiaMallBundle\Entity\DemandePub;
use TunisiaMallBundle\Entity\Publicite;
use TunisiaMallBundle\Form\AjoutDemandePub;
use TunisiaMallBundle\Form\AjoutPubliciteForm;
use TunisiaMallBundle\Form\ModifierPubliciteForm;


class PubliciteController extends Controller
{


    public function listpubAction()
    {

        $em = $this->getDoctrine()->getManager();
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
        return $this->render("TunisiaMallBundle::publicite.html.twig", array(
            "publicites" => $publicites
        ));
    }

    public function modifierpubAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $publicite = $em->getRepository("TunisiaMallBundle:Publicite")->find($id);
        $form = $this->createForm(ModifierPubliciteForm::class, $publicite);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $time = new \DateTime("now");
            if ($publicite->getDateFin() > $publicite->getDateDebut()) {
                if ($publicite->getDateFin() > $time && $publicite->getDateDebut() > $time) {
                    var_dump($time);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($publicite);
                    $em->flush();
                    return $this->redirectToRoute('tunisia_mall_admin_publicite');
                }
            } else {
                ?>
                <script>
                    alert("attention aux date!");
                </script>
                <?php
            }
        }
        return $this->render("TunisiaMallBundle::modifierpublicite.html.twig", array(
            "formulaire" => $form->createView()
        ));
    }

    public function refuserpublicteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $demandepublicite = $em->getRepository("TunisiaMallBundle:DemandePub")->find($id);
        $em->remove($demandepublicite);
        $em->flush();
        return $this->redirectToRoute('tunisia_mall_admin_liste_demande_publicite');
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
        $publicite = new Publicite();
        $form = $this->createForm(AjoutPubliciteForm::class, $publicite);
        $form->handleRequest($request);
        if ($form->isValid()) {
            if ($publicite->getDateFin() > $publicite->getDateDebut()) {
                $time = new \DateTime("now");
                if ($publicite->getDateFin() > $time && $publicite->getDateDebut() > $time) {
                    var_dump(date('Y-m-d'));
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($publicite);
                    $em->flush();
                    return $this->redirectToRoute('tunisia_mall_admin_publicite');
                }
            } else {
                ?>
                <script>
                    alert("attention aux date!");
                </script>
                <?php
            }
        }
        return $this->render("TunisiaMallBundle::ajoutpublicite.html.twig", array(
            "formulaire" => $form->createView()
        ));
    }

    public function demandeajoutpubAction(Request $request)
    {
        $demandepub = new DemandePub();
        $form = $this->createForm(AjoutDemandePub::class, $demandepub);
        $form->handleRequest($request);
        if ($form->isValid()) {
            if ($demandepub->getDateFin() > $demandepub->getDateDebut()) {
                $time = new \DateTime("now");
                if ($demandepub->getDateFin() > $time && $demandepub->getDateDebut() > $time) {
                    var_dump(date('Y-m-d'));
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($demandepub);
                    $em->flush();
                    return $this->redirectToRoute('tunisia_mall_chatshop');

                }
            } else {
                ?>
                <script>
                    alert("attention aux date!");
                </script>
                <?php
            }
        }
        return $this->render("TunisiaMallBundle::ajoutdemandepublicite.html.twig", array(
            "formulaire" => $form->createView()
        ));
    }

    public function listdemandepubAction()
    {
        $em = $this->getDoctrine()->getManager();
        $publicites = $em->getRepository("TunisiaMallBundle:DemandePub")->findAll();
        return $this->render("TunisiaMallBundle::listedemandepub.html.twig", array(
            "publicites" => $publicites
        ));
    }

    public function acceptajoutpubAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $demandepublicite = $em->getRepository("TunisiaMallBundle:DemandePub")->find($id);

        $publicite = new Publicite();
        $publicite->setDateDebut($demandepublicite->getDateDebut());
        $publicite->setDateFin($demandepublicite->getDateFin());
        $publicite->setPrix($demandepublicite->getPrix());
        $publicite->setPath($demandepublicite->getPath());
        $publicite->setPage($demandepublicite->getPage());
        $publicite->setImageFile($demandepublicite->getImageFile());
        $publicite->setIdBoutique($demandepublicite->getIdBoutique());
        $em->persist($publicite);
        $em->remove($demandepublicite);
        $em->flush();
        return $this->redirectToRoute('tunisia_mall_admin_publicite');


    }
}