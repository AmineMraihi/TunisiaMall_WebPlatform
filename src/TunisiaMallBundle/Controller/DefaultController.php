<?php

namespace TunisiaMallBundle\Controller;

use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\Entity\Reclamation;
use TunisiaMallBundle\Entity\User;
use TunisiaMallBundle\Entity\Boutique;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TunisiaMallBundle\Form\UserRegistrationType;
use Twilio\Rest\Client;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {

        $user=$this->getUser();

        $reclamation=new Reclamation();
        if($request->isMethod('POST'))
        {
            $reclamation->setText($request->get('description'));
            $reclamation->setType($request->get('type'));
            $reclamation->setIdReclamant( $user);
            $reclamation->setIdPReclame($this->rechercheshopowner($this->Rechercheboutique($request->get('nomB'))));
            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();
        }}
        $em = $this->getDoctrine()->getManager();
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
        $produits = $em->getRepository("TunisiaMallBundle:Produit")->findAll();

        $em=$this->getDoctrine()->getManager();
        $boutiques=$em->getRepository("TunisiaMallBundle:Boutique")->findAll();


        return $this->render('TunisiaMallBundle:Default:index.html.twig', array(
            "publicites" => $publicites,
            "produits" => $produits,
            "boutiques"=>$boutiques

        ));




    }

    public function clientproduitAction()
    {

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository("TunisiaMallBundle\\Entity\\Produit")->findAll();
        return $this->render("TunisiaMallBundle:Default:index.html.twig", array(
            "Produits " => $produits


        ));
    }

    public function shopownerevenementAction()
    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository("TunisiaMallBundle:Evenement")->findAll();
        return $this->render("TunisiaMallBundle:evenement:shopownerevenement.html.twig", array(
            "evenements" => $evenements
        ));
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
    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminindexAction()
    {
//        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        return $this->render('TunisiaMallBundle::templateadmin.html.twig');
//        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

      //  return $this->render('TunisiaMallBundle::templateadmin.html.twig');
    }

    public function GBoutiqueCAAction()
    {
        return $this->render('TunisiaMallBundle::GestionBoutique.html.twig');
    }

    public function adminpubliciteAction()
    {
        return $this->render('TunisiaMallBundle::publicite.html.twig');
    }

    public function clientevenementAction()
    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository("TunisiaMallBundle:Evenement")->findAll();
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
        $produits = $em->getRepository("TunisiaMallBundle:Produit")->findAll();
        $boutiques=$em->getRepository("TunisiaMallBundle:Boutique")->findAll();

        return $this->render("TunisiaMallBundle:evenement:clientevenement.html.twig", array(
            "evenements" => $evenements,
            "publicites" => $publicites,
            "produits" => $produits,
            "boutiques" =>$boutiques

        ));
    }
    public function Rechercheboutique($nom)
    {

        $em = $this->getDoctrine()->getManager();
        $boutique = $em->getRepository("TunisiaMallBundle:Boutique")->findBynom($nom);
        return $boutique;
    }
    public function rechercheshopowner($boutique)
    {
        $idBoutique=$boutique[0]->getIdBoutique();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("TunisiaMallBundle:User")->findByidBoutique($idBoutique);
        return $user[0];
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


    ///////////////this code is added by ahmed merzoug

    /**
     * @Route("/", name="homepage")
     */
    public function tryfosmesageAction()
    {
        $repository = $this->get('fos_message.repository');
        $sender = $this->get('fos_message.sender');

        return $this->render('default/index.html.twig');
    }

    public function templateclientAction()
    {
        return $this->render('TunisiaMallBundle::templateC.html.twig');
    }

    public function offreShopownerAction()
    {
        return $this->render('TunisiaMallBundle::offreshopowner.html.twig');
    }



    public function composersmsAction()
    {


        $em = $this->getDoctrine()->getManager();
        $responsables = $em->getRepository("TunisiaMallBundle:User")->findAll();

        return $this->render('TunisiaMallBundle::composesms.html.twig', array(
            "users" => $responsables
        ));


    }

    public function sendsmsAction(Request $request)
    {
        $telephone = $request->get('select');
        $subject=$request->get('subject');
        $content = $request->get('content');


        $sid = 'ACf863defe10693d3d9dc1cb4faf65ee80';
        $token = '1771eb99469083940a29e118fa22cdbf';
        $client = new Client($sid, $token);
        $client->messages->create(
        // the number you'd like to send the message to
            '+216'.$telephone,
            array(
                // A Twilio phone number you purchased at twilio.com/console
                'from' => '+13203723228',
                // the body of the text message you'd like to send
                'body' => $subject .":".$content
            )
        );
        return $this->render('TunisiaMallBundle::templateadmin.html.twig');

    }





}

