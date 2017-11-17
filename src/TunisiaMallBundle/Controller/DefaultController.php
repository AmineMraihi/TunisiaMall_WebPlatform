<?php

namespace TunisiaMallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $user=new User();
        if($request->isMethod('POST')){
            $user->setNom($request->get('Name'));
            $user->setPrenom($request->get('LastName'));
//            $user->setDateNaissance($request->get('DateNaissance'));
            $user->setNumeroTelephone($request->get("Numerotel"));
            $user->setAdresse($request->get("Adresse"));
            $user->setEmail($request->get('Email'));
            $user->setPassword($request->get('password'));
            $user->setUsername($request->get('Username'));
            $user->setSexe($request->get('sexe'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }
        return $this->render('TunisiaMallBundle:Default:index.html.twig');
    }
    public function ContactAction()
    {
        return $this->render('TunisiaMallBundle:Default:Contact.html.twig');
    }

    public function adminevenementAction()
    {
        return $this->render('TunisiaMallBundle::evenement.html.twig');
    }

    public function adminindexAction()
    {
        return $this->render('TunisiaMallBundle::adminindex.html.twig');
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

