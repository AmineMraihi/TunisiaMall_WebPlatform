<?php

namespace TunisiaMallBundle\Form;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ModifierResponsableBoutiqueForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('date_expiration',DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'))
            ->add('numero_telephone')
            ->add('adresse')
            ->add("idBoutique", EntityType::class, array(
                'class' => "TunisiaMallBundle\Entity\Boutique",
                'choice_label' => 'nom',
                'multiple' => false,
            ))
            ->add("save", SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'tunisia_mall_bundle_modifier_responsable_boutique_form';
    }
}
