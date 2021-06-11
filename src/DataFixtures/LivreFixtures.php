<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\Entity\Livre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LivreFixtures extends Fixture
{
    public function loadLivre(ObjectManager $manager)
    {
        $livres = [];

        $livre = new Livre();
        $livre->setTitre('Lorem ipsum dolor sit amet');
        $livre->setAnneeEdition(2010);
        $livre->setNombrePages(100);
        $livre->setCodeIsbn('9785786930024');
        $livre->setAuteur($auteurs[0]);
        $livre->addGenre(1);
        $livre->addEmprunt(1);

        $manager->persist($livre);
        $livres[] = $livre;

        $manager->flush();
    }

}
