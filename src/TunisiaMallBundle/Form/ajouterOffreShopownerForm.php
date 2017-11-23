<?php
/**
 * Created by PhpStorm.
 * User: bn
 * Date: 18/11/2017
 * Time: 22:43
 */

namespace TunisiaMallBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ajouterOffreShopownerForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)

    {
        $builder


            ->add('poste')
            ->add('specialite')
            ->add('salaire')
            ->add('nbrDemande')
            ->add('dateExpiration')

            ->add("Save", SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'offre_form';
    }


}