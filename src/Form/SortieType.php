<?php

namespace App\Form;

use App\Entity\sortie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'Title'
            ])
            ->add('overview', null)
            ->add('status', ChoiceType::class, [
                'choices'=>[
                    'annule'=>'annule',
                    'fini'=>'fini',
                    'a venir'=>'a venir'
                ],
                'multiple'=>false
            ])
            ->add('max')
            ->add('date', DateType::class, [
                'html5'=>true,
                'widget'=>'single_text',
            ])
            ->add('during')
            ->add('dateLimite', DateType::class, [
                'html5'=>true,
                'widget'=>'single_text',
    ])
            ->add('dateCreated', DateType::class, [
                'html5'=>true,
                'widget'=>'single_text',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => sortie::class,
        ]);
    }
}
