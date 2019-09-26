<?php

namespace App\Form;

use App\Entity\Publication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('coAuthors', null, [
                'attr' => [
                    'class' => 'js-select2'
                ]
            ])
            ->add('coAuthorsSimple')
            ->add('place')
            ->add('date',DateType::class, [
                'widget' => 'single_text',
                'format'      => 'MMMM yyyy',
                'attr' => [
                    'class' => 'js-datepicker'
                ]
            ])
            ->add('pages')
            ->add('notes')
            ->add('file')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}
