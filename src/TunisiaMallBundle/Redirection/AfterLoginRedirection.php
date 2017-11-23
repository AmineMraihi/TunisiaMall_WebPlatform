<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 22/11/2017
 * Time: 15:27
 */

namespace TunisiaMallBundle\Redirection;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
{

    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $roles = $token->getRoles();
        $rolesTab = array_map(function($role){
            return $role->getRole();
        }, $roles);
        if (in_array('ROLE_ADMIN', $rolesTab, true) )
            $redirection = new RedirectResponse($this->router->generate('tunisia_mall_admin_homepage'));
        elseif (in_array('ROLE_RESPONSABLE', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('tunisia_mall_chatshop'));
        else
            $redirection = new RedirectResponse($this->router->generate('tunisia_mall_homepage'));

        return $redirection;
    }
}