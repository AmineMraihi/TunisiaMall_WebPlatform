<?php

namespace TunisiaMallBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
class ModifierPromotion extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("taux_reduction" ,IntegerType::class)
            ->add("date_debut",DateType::class)

            ->add("date_fin",DateType::class)
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete'  => true,
                'download_link' => true,
            ])
            ->add("id_produit",EntityType::class,array(
                'class'=>"TunisiaMallBundle\Entity\Produit",
                'choice_label' => 'nom',
                'multiple' => false,
                'disabled' => true


            ))




        ->add("Modifier", SubmitType::class);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    }

    public function getName()
    {
        return 'tunisia_mall_bundle_modifier_promotion';
    }
}