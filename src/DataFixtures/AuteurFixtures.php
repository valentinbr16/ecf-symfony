<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;

class AuteurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $auteurs = [];

        $auteur = new Auteur();
        $auteur->setNom('auteur');
        $auteur->setPrenom('inconnu');

        $manager->persist($auteur);
        $auteurs[] = $auteur;

        $manager->flush();
    }

}
