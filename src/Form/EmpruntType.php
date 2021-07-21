<?php

namespace App\Form;

use App\Entity\Emprunt;
use App\Entity\Emprunteur;
use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class EmpruntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_emprunt')
            ->add('date_retour')
            ->add('livre', EntityType::class, [
                'class' => Livre::class,

                'choice_label' => function(Livre $livre) {
                    return "{$livre->getTitre()}";
                }
            ])
            ->add('emprunteur', EntityType::class, [
                'class' => Emprunteur::class,

                'choice_label' => function(Emprunteur $emprunteur) {
                    return "{$emprunteur->getNom()} {$emprunteur->getPrenom()}";
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Emprunt::class,
        ]);
    }
}
