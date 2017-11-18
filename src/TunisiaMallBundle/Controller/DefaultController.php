<?php

namespace TunisiaMallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TunisiaMallBundle:Default:index.html.twig');
    }
    public function ContactAction()
    {
        return $this->render('TunisiaMallBundle:Default:Contact.html.twig');
    }
    public function iContactAction()
    {
        return $this->render('TunisiaMallBundle:Default:Contactinternaute.html.twig');
    }

    public function adminevenementAction()
    {
        return $this->render('TunisiaMallBundle::evenement.html.twig');
    }

    public function adminindexAction()
    {
        return $this->render('TunisiaMallBundle::adminindex.html.twig');
    }
    public function GBoutiqueCAAction()
    {
        return $this->render('TunisiaMallBundle::GestionBoutique.html.twig');
    }

    public function clientevenementAction()
    {
        $em=$this->getDoctrine()->getManager();
        $evenements=$em->getRepository("TunisiaMallBundle:Evenement")->findAll();
        return $this->render("TunisiaMallBundle::clientevenement.html.twig",array(
            "evenements"=>$evenements
        ));
    }



    public function signupAction(Request $request)
    {
        $user = new User();

        if ($request->isMethod('POST')) {
            $user->setEmail($request->get("email"));
            $user->setUsername($request->get("username"));
            $user->setPassword($request->get("password"));
            $user->setNom($request->get("nom"));
            $user->setPrenom($request->get("prenom"));
            $user->setSexe($request->get("sexe"));
            $user->setNumeroTelephone($request->get("numero_telephone "));
            $user->setAdresse($request->get("adresse"));
            $user->setSalaire($request->get("salaire"));
            $user->setPath($request->get("path"));
            $user->setIdBoutique($request->get("id_boutique"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }
        return $this->render("TunisiaMallBundle::signup.html.twig",
            array()
        );
    }

    public function aboutAction()
    {
        return $this->render('TunisiaMallBundle:Default:about.html.twig');
    }

}

