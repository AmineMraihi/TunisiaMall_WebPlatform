<?php

namespace TunisiaMallBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DatePromotionCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('tunisia_mall:date_promotion_command')
            ->setDescription('Hello PhpStorm');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'AHMED PROMOTION',
            '============',
            '',
        ]);

        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $Promotions = $em->getRepository("TunisiaMallBundle:Promotion")->findBy(array('idPromotion'=>'14'));
        $datejour = date('d-m-Y');
        var_dump($datejour);

        {
            $datejour = date('d-m-Y');
            $Promotions->getIdPromotion();
            var_dump($Promotions);
            var_dump($datejour);

        }
 /*       //Astuce trouvée sur http://blog.galerie-cesar.com
//----------------------------------------------------------------
        $datejour = date('d/m/Y');
        //la date du fin est stocké dans une base de données
        //on extracte la date du fin depuis la bdd et on la met dans une variable $datefin
        $datefin= $donnees['fin'];

        //explode pour mettre la date du fin en format numerique: 12/05/2006  -> 12052006
        $dfin = explode("/", $datefin);

        //explode pour mettre la date du jour en format numerique: 31/05/2009  -> 31052009
        $djour = explode("/", $datejour);

        // concaténation pour inverser l'ordre: 12052006 -> 20060512
        $finab = $dfin[2].$dfin[1].$dfin[0];
        // concaténation pour inverser l'ordre: 31052009 -> 20090531
        $auj = $djour[2].$djour[1].$djour[0];

        // Ensuite il suffit de comparer les deux valeurs

        if ($auj>$finab)
        {
            //------Abonnement expiré;-------
            echo "abonnement expiré":
 }
        else
        {
            //-------Abonnement en cours-----
            echo "abonnement valide":

    }*/
}
}