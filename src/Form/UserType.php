<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Config\Monolog\HandlerConfig\EmailPrototypeConfig;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label'=>'Title'])
            ->add('prénom', TextType::class, ['label'=>'Title'])
            ->add('admin')
            ->add('actif', ChoiceType::class, [
                'choices'=>[
                    'Present'=>'Present',
                    'Absent'=>'Absent'
                ]
            ])
            ->add('email', EmailPrototypeConfig::class)
            ->add('motDepasse')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
