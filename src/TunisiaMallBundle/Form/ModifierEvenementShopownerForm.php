<?php

namespace TunisiaMallBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ModifierEvenementShopownerForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('date',DateType::class)
//            ->add('path')
            ->add('idUser',EntityType::class,array(
                'class'=>"TunisiaMallBundle\Entity\User",
                'choice_label' => 'nom',
                'multiple'=>false,
            ))
            ->add("imageFile",VichImageType::class,array(
                'required' => false,
                'allow_delete'  => true,
                'download_link' => true,
            ))
            ->add("save", SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'tunisia_mall_bundle_modifier_evenement_shopowner_form';
    }
}
