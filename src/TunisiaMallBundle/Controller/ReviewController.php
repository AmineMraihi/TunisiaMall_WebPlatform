<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 11/22/2017
 * Time: 9:34 PM
 */


namespace TunisiaMallBundle\Controller;
use TunisiaMallBundle\Entity\Produit;
use TunisiaMallBundle\Entity\Review11;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ReviewController extends Controller
{


    public function AjouterReviewAction($id_dis,Request $request)
    {
        $user = $this->getUser();
        $Review11 = new Review11();
        $em = $this->getDoctrine()->getManager();


        if ($request->isMethod('GET')){
            $Review11->setEmail($request->get('email'));
            $Review11->setContenu($request->get('contenu'));
            $Review11->setAb($id_dis);




            $em->persist($Review11);
            $em->flush();

        }
        return $this->redirectToRoute("tunisia_mall_homepage");


}
}