<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('field_name', null, [
                'required' => false,
            ])

        ->add('email', null, [
            'required' => false,
        ])
        ->add('roles', TextType::class)
        ->add('password')
        ->add('firstname', TextType::class, [
            'label' => 'Nom'])
        ->add('lastname', TextType::class, [
            'label' => 'Prenom'])
        ->add('pseudo', TextType::class, [
            'label' => 'Pseudo'])
        ->add('telephone', null, [
            'required' => false,
        ])
        ->add('password', null, [
            'required' => false,
        ])
        ->add('confirmation', null, [
            'required' => false,
        ])
        ->add('campus', null, [
            'required' => false,
        ])
        ->add('photo', null, [
            'required' => false,
        ])
    ;
    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}




