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
       $idboutique=$this->getUser()->getIdBoutique()->getIdboutique();
//var_dump($idboutique);
        $em = $this->container->get('doctrine')->getEntityManager();
        $publicites = $em->getRepository("TunisiaMallBundle:Publicite")->findAll();
        $produits=$em->getRepository("TunisiaMallBundle:Produit")->findByidBoutique($idboutique);

        $boutiques=$em->getRepository("TunisiaMallBundle:Boutique")->findAll();

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
        return $this->render('TunisiaMallBundle:Graphe:historgramme.html.twig',array('chart'=>$ob,
         "publicites" => $publicites,
            "produits" => $produits,
            "boutiques"=>$boutiques,

        ));


    }


    public function chartPieAction(){
        $ob = new Highchart();
        $ob->chart->renderTo('piechart');
        $ob->title->text('Pourcentages des demandes sexe');
        $ob->plotOptions->pie(array(
            'allowPointSelect'  => true,
            'cursor'    => 'pointer',
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));
        $em= $this->container->get('doctrine')->getEntityManager();
        $demandes = $em->getRepository('TunisiaMallBundle:DemandeEmploi')->CountSexe();
        $totaldemande=0;
        foreach($demandes as $demande) {
            $totaldemande=$totaldemande+$demande;
        }
        var_dump($totaldemande);
        $data= array();
        foreach($demandes as $demande) {
            $stat=array();
            array_push($stat,$demande->getSexe(),(($demande->getIdDemande()) *100)/$totaldemande);
            //var_dump($stat);
            array_push($data,$stat);
        }
        // var_dump($data);
        $ob->series(array(array('type' => 'pie','name' => 'Browser share', 'data' => $data)));
        return $this->render('TunisiaMallBundle:Graphe:pieChart.html.twig', array(
            'chart' => $ob
        ));
    }






}
