<?php

namespace App\Form;

use App\Entity\ScientificInterest;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
//            ->add('roles')
//            ->add('password')
            ->add('firstName')
            ->add('secondName')
            ->add('birthDate', null, [
                'attr' => [
                    'class' => 'date-picker'
                ]
            ])
            ->add('email')
            ->add('patronymic')
            ->add('birthPlace')
            ->add('education')
            ->add('degree')
            ->add('biography')
            ->add('interest', null, [
                'attr' => [
                    'class' => 'select2'
                ]
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
