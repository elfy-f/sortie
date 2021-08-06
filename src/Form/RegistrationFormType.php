<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', null, [
            'required' => false,
        ])
        ->add('email', null, [
            'required' => false,
        ])
        ->add('lastname', TextType::class, [
            'label' => 'Prenom'
        ])
        //->add('pseudo', TextType::class, [
        //    'label' => 'Pseudo'])
        ->add('phone', IntegerType::class, [
            'required' => false,
        ])
        ->add('plainPassword', PasswordType::class, [
            'mapped' => false,
            'constraints'=>[
                new NotBlank([
                    'message'=>'A remplir'
                ]),
                new Length([
                    'min'=>3,
                    'minMessage'=>'password trop court 3 caractères minimum'
                ]),
        ]])


        ->add('campus', ChoiceType::class, [
            'choices'=>[
                'Rennes'=>'Rennes',
                'Niort'=>'Niort',
                'Nantes'=>'Nantes'
            ],
            'multiple'=>false])




        ->add('town', TextType::class, [
        'label' => 'Ville'
    ])

        ->add('admin', ChoiceType::class, [
            'choices'=>[
                'oui'=>'oui',
                'non'=>'non'
    ]]) ;


    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}




