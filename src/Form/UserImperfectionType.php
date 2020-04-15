<?php

namespace App\Form;

use App\Entity\ImperfectionType;
use App\Entity\UserImperfection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserImperfectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('place', ChoiceType::class, [
                'choices' => [
                    'Front' => 'Front',
                    'Au niveau des Yeux' => 'Yeux',
                    'Nez' => 'Nez',
                    'Joue' => 'Joue',
                    'Autour de la Bouche' => 'Bouche',
                    'Menton' => 'Menton',

                ]
            ])
            //->add('DateImperfection')
            ->add('CategoryImperfection', ChoiceType::class, [
                'choices' => [

                ],
                'choice_value' => 'Label'

                //'choice_label' => static function (?ImperfectionType $imperfectionType) {
                //   return $imperfectionType ? strtoupper($imperfectionType->getLabel()) : '';
                //}
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserImperfection::class,
        ]);
    }
}
