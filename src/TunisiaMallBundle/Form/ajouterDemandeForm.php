<?php
/**
 * Created by PhpStorm.
 * User: bn
 * Date: 18/11/2017
 * Time: 22:43
 */

namespace TunisiaMallBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ajouterDemandeForm extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nomEmp')
            ->add('prenomEmp')
            ->add('dateNaissance')
            ->add('adresse')
            ->add('sexe')
            ->add('email')
            ->add('numTel')
            ->add('qualification')
            ->add('experience')

           ;


    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'demande_form';
    }

}