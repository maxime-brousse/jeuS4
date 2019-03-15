<?php

namespace App\Form;

use App\Entity\Parties;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('partie_statut')
            ->add('partie_tourde')
            ->add('partie_de')
            ->add('partie_terrain')
            ->add('partie_typeV')
            ->add('partie_j2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Parties::class,
        ]);
    }
}
