<?php

namespace TunisiaMallBundle\Form;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver;
use FOS\UserBundle\Form;


class UserRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'))
            ->add('sexe')
            ->add('numero_telephone')
            ->add('adresse')
            ->add('salaire')
            ->add('date_embauche', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'))
            ->add('date_expiration', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'))
            ->add('path')
//            ->add('id_boutique')
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('roles');
        ;


    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getName()
    {
        return 'tnmall_user_registration';
    }
}
