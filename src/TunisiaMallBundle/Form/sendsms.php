<?php

namespace TunisiaMallBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class sendsms extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("user", EntityType::class, array(
                'class' => "TunisiaMallBundle\Entity\User",
                'choice_label' => 'numeroTelephone',
                'multiple' => false,
            ))
            ->add("subjet")
            ->add("content")
            ->add("ajouter", SubmitType::class);


    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'tunisia_mall_bundlesendsms';
    }
}
