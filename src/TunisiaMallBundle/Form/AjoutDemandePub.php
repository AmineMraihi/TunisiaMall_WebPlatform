<?php

namespace TunisiaMallBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AjoutDemandePub extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("date_debut", DateType::class)
            ->add("date_fin", DateType::class)
            ->add("prix", IntegerType::class)
            ->add("page")
            ->add("imageFile", VichImageType::class, array(
                'required' => false,
                'allow_delete' => true,
                'download_link' => true,
            ))
//            ->add("idBoutique", EntityType::class, array(
//                'class' => "TunisiaMallBundle\Entity\Boutique",
//                'choice_label' => 'nom',
//                'multiple' => false,
//            ))
            ->add("ajouter", SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'tunisia_mall_bundle_ajout_demande_pub';
    }
}
