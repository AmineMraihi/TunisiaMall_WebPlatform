<?php

namespace TunisiaMallBundle\Form;

use Doctrine\DBAL\Types\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutBoutiqueForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add("nom")
            ->add("type",ChoiceType::class, array(
                'choices'  => array(
                    'vetements' => 'vetements',
                    'Accessoires' => 'accessoires',
                    'Supermarché' => 'supermarche',
                    'Art et culture' => 'artetculture',
                    'Beauté et bien etre ' => 'beaute',
                    'Restauration' => 'restauration',
                    'Sport' => 'sport',
                    'Service et technologies' => 'service',
                ),))
            ->add("position",ChoiceType::class, array(
                'choices'  => array(
                    'niveau 0' => 'niveau0',
                    'niveau 1' => 'niveau1',
                    'niveau 2' => 'niveau2',
                    'niveau 3' => 'niveau3',

                ),))
            ->add("datecreation", DateType::class)
            ->add("dateexpiration", DateType::class)
            ->add("ajouter", SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'tunisia_mall_bundle_ajout_boutique_form';
    }
}
