<?php

namespace TunisiaMallBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Component\Form\Extension\Core\Type\MoneyType;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class modifierproditForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("nom")
            ->add("type")
            ->add("prix",MoneyType::class)
            ->add("quantite",IntegerType::class)
            ->add("prixAchatGros",MoneyType::class)

            ->add("nbVente",HiddenType::class)
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete'  => true,
                'download_link' => true,

            ])

            ->add("description")
            -> add('id_boutique', HiddenType::class)




            ->add("Modifier", SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'tunisia_mall_bundlemodifierprodit_form';
    }
}
