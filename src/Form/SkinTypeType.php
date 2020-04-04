<?php

namespace App\Form;

use App\Entity\SkinType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SkinTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Label')
            ->add('Tone')
            ->add('Brightness')
            ->add('Pores')
            ->add('Sensibility')
            ->add('Blackhead')
            ->add('Description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SkinType::class,
        ]);
    }
}