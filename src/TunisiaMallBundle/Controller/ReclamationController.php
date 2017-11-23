<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 20/11/2017
 * Time: 21:48
 */

namespace TunisiaMallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\Entity\Reclamation;
use TunisiaMallBundle\Entity\User;
use TunisiaMallBundle\Entity\Boutique;
use TunisiaMallBundle\Form\RepondreReclamationForm;
use MyAppMailBundle\Entity\Mail;
use Symfony\Component\HttpFoundation\Response;
use Swift_Message;

class ReclamationController extends Controller
{
    public function afficherreclamationsAction()
    {
        $em=$this->getDoctrine()->getManager();

        $reclamations=$em->getRepository("TunisiaMallBundle:Reclamation")->findAll();



        return $this->render("TunisiaMallBundle::GestionReclamation.html.twig",array(
             "reclamations"=>$reclamations
        ));
    }
    public function afficherreclamationsshopAction()
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {

            $user=$this->getUser();}
        $em=$this->getDoctrine()->getManager();

        $reclamations=$em->getRepository("TunisiaMallBundle:Reclamation")->findByidPReclame(2);



        return $this->render("TunisiaMallBundle::GestionReclamationshop.html.twig",array(
            "reclamations"=>$reclamations
        ));
    }

    public function supprimerReclamationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $reclamation = $em->getRepository("TunisiaMallBundle:Reclamation")->find($id);
        $em->remove($reclamation);
        $em->flush();
        return $this->redirectToRoute('tunisia_mall_list_reclamation');
    }


    public function RepondreReclamationAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $reclamation=$em->getRepository("TunisiaMallBundle:Reclamation")->find($id);

        $mail = new Mail($reclamation->getIdReclamant()->getEmail(),"",$reclamation->getIdReclamant()->getNom());
        $form=  $this->createForm(RepondreReclamationForm::class,$mail);
        $form->handleRequest($request) ;
        if ($form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject('Lettre de reponse à une plainte')
                ->setFrom('jassemkochbati23@gmail.com')
                ->setTo($mail->getEmail())
                ->setBody(
                    $this->renderView(
                        'TunisiaMallBundle::email.html.twig',
                        array('nom' => $mail->getNom())
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('my_app_mail_accuse'));
        }

        return $this->render('TunisiaMallBundle::RepondreReclamation.html.twig', array('form'=>$form->createView()));

    }
    public function successAction(){
        return new Response("email envoyé avec succès, Merci de vérifier votre boite mail.");
    }
}