<?php

namespace App\Form;

use App\Entity\Livre;
use App\Entity\Auteur;
use App\Entity\Genre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('annee_edition')
            ->add('nombre_pages')
            ->add('code_isbn')
            ->add('auteur', EntityType::class, [
                'class' => Auteur::class,

                'choice_label' => function(Auteur $auteur) {
                    return "{$auteur->getNom()} {$auteur->getPrenom()}";
                },
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('genres', EntityType::class, [
                'class' => Genre::class,

                'choice_label' => function(Genre $genre) {
                    return "{$genre->getNom()}";
                },
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
