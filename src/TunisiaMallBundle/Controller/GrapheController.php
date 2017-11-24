<?php
namespace TunisiaMallBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TunisiaMallBundle\Entity\Produit;
use TunisiaMallBundle\Form\AjoutEvenementForm;
use TunisiaMallBundle\Form\AjoutevenementShopownerForm;
use TunisiaMallBundle\Form\ModifierEvenementForm;
use TunisiaMallBundle\Form\ModifierEvenementShopownerForm;
use TunisiaMallBundle\TunisiaMallBundle;
use TunisiaMallBundle\Entity\DemandeEmploi;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Zend\Json\Expr;


class GrapheController extends Controller
{

    public function chartHistogrammeAction()
    {

        $em = $this->container->get('doctrine')->getEntityManager();

        $produits = $em->getRepository('TunisiaMallBundle:Produit')->findAll();

        $categories = array();
        $nbrvente=array();
        foreach ($produits as $Produit) {
            array_push($nbrvente, $Produit->getNbVente());
            array_push($categories, $Produit->getNom());
        }

        // Chart
        $series = array(
            array(
                'name' => 'Produit',
                'type'=>'column',
                'color'=>'#4572A7',
                'yAxis'=>0,
                'data'=>$nbrvente,
            )
        );
        $yData = array(

            array(
                'labels' => array(
                    'formatter' => new Expr('function () { return this.value + "" }'),
                    'style'     => array('color' => '#4572A7')
                ),
                'gridLineWidth' => 0,
                'title' => array(
                    'text'  => 'Nombre de vente',
                    'style' => array('color' => '#4572A7')
                ),
            ),
        );



        $ob = new Highchart();
        $ob->chart->renderTo('container');  //  #id du div où afficher le graphe
        $ob->title->text('Nombre de vente par produit');

        $ob->xAxis->categories($categories);
        $ob->yAxis($yData);
        $ob->legend->enabled(false);
        $formatter = new Expr('function(){
                                        var unit={ "Produit": "produit(s)",}
                                        [this.series.name];
                                        
                                      return this.x+": <b>"+this.y+"</b>"+unit;  
                                        }');

        $ob->tooltip->formatter($formatter);
        $ob->series($series);
        return $this->render('TunisiaMallBundle:Graphe:historgramme.html.twig',array('chart'=>$ob));


    }



}
