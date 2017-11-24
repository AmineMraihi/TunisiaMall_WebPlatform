<?php

namespace TunisiaMallBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use TunisiaMallBundle\Entity\Produit;

class Archive1Command extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('tunisia_mall:archive1command')
            ->setDescription('please_work');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'clothes still in stock',
            '============',
            '',
        ]);

        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $Produits = $em->getRepository("TunisiaMallBundle:Produit")->findBy(array("type"=>"Clothes"));

        foreach ($Produits as $produit)
        {

//                $reclamation->setArchive(1);
                $em->remove($produit);
                $em->flush();

        }
        // outputs multiple lines to the console (adding "\n" at the end of each line)


        // outputs a message followed by a "\n"
        $output->writeln('Whoa!');

        // outputs a message without adding a "\n" at the end of the line

        $output->write('archivage términéééé xD .');
    }
}

