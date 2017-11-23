<?php
/**
 * Created by PhpStorm.
 * User: bn
 * Date: 19/11/2017
 * Time: 13:30
 */

namespace TunisiaMallBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class ModifierOffreForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('Boutique',EntityType::class,array('class'=>'TunisiaMallBundle:Boutique','choice_label'=>'nom','multiple'=>false))
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
        return 'tunisia_mall_bundle_modifier_offre_form';
    }
}