<?php

namespace App\Form;

use App\Entity\Joueurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JoueursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('joueur_mdp')
            ->add('joueur_email')
            ->add('joueur_date')
            ->add('joueur_last')
            ->add('joueur_win')
            ->add('joueur_loose')
            ->add('joueur_duree')
            ->add('joueur_speudo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Joueurs::class,
        ]);
    }
}
