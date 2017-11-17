<?php

namespace TunisiaMallBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutEvenementForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("nom")
            ->add("description")
            ->add("date",DateType::class)
            ->add("path")
//                ->add('path',VichImageType)
            ->add("idUser",EntityType::class,array(
                'class'=>"TunisiaMallBundle\Entity\User",
                'choice_label' => 'nom',
                'multiple'=>false,
            ))
            ->add("ajouter", SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'tunisia_mall_bundle_ajout_evenement_form';
    }
}
