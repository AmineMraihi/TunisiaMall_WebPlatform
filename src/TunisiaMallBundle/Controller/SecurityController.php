<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 18/11/2017
 * Time: 21:44
 */

namespace TunisiaMallBundle\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\SecurityController as BaseSecurityController;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends BaseSecurityController
{
    protected function renderLogin(array $data)
    {
        $template = null === $this->get('request_stack')->getParentRequest()
            ? 'FOSUserBundle:Security:login.html.twig'
            : 'TunisiaMallBundle:Security:login.html.twig'
        ;

        return $this->render($template, $data);
    }
}