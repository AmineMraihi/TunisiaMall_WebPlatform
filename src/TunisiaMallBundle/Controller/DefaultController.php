<?php

namespace TunisiaMallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

}

