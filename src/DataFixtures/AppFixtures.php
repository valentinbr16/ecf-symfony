<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Auteur;
use App\Entity\Livre;
use App\Entity\Genre;
use App\Entity\Emprunteur;
use App\Entity\Emprunt;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
// composer require fzaninotto/faker
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    private $faker;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
        $this->faker = FakerFactory::create('fr_FR');
    }

    public static function getGroups(): array
    {
        return ['test'];
    }

    public function load(ObjectManager $manager)
    {
        $livresCount = 1000;
        $auteursCount = 500;
        $emprunteursCount = 100;
        $empruntsCount = 200;

        $this->loadUser($manager);
        $this->loadLivre($manager, $livresCount);
        $this->loadAuteur($manager, $auteursCount);
        $this->loadGenre($manager);
        $this->loadEmprunteur($manager, $emprunteursCount);
        $this->loadEmprunt($manager, $empruntsCount);

        $manager->flush();
    }

    public function loadUser(ObjectManager $manager)
    {
        $users = [];
        $user = new User();
        $user->setEmail('admin@example.com');
        $user->setRoles(['ROLE_ADMIN']);
        
        $password = $this->encoder->encodePassword($user, '123');
        $user->setPassword($password);

        $manager->persist($user);
        $users[] = $user;
    }

    public function loadLivre(ObjectManager $manager, int $count)
    {
        $livres = [];

        $isbn = '9785786930024';

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

        for($i = 1; $i < $count; i++) {
        $livre = new Livre();
        $livre->setTitre($this->faker->sentence(2));
        $livre->setAnneeEdition($this->faker->numberBetween($min = 1950, $max = 2021));
        $livre->setNombrePages($this->faker->numberBetween($min = 30, $max = 1000));
        $livre->setCodeIsbn($isbn + $i);
        // @todo  2 random livre per auteur 
        $livre->setAuteur($auteurs[0]);
        $livre->addGenre($this->faker->numberBetween($min = 1, $max = 13));
        // @todo random emprunteur
        $livre->addEmprunt(1);

        $manager->persist($livre);
        $livres[] = $livre;
        }
    }

    public function loadAuteur(ObjectManager $manager, int $count)
    {
        $auteurs = [];
        $auteur = new Auteur();
        $auteur->setNom('auteur');
        $auteur->setPrenom('inconnu');

        $manager->persist($auteur);
        $auteurs[] = $auteur;

        for($i = 1; $i < $count; i++) {
            $auteurs = [];
            $auteur = new Auteur();
            $auteur->setNom($this->faker->lastname());
            $auteur->setPrenom($this->faker->firstname());
            

            $manager->persist($auteur);
            $auteurs[] = $auteur;
            }
    }

    public function loadGenre(ObjectManager $manager)
    {
        $genres = [];
        $genre = new Genre();
        $genre->setNom('poésie');

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom('nouvelle');

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom('roman historique');

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom("roman d'amour");

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom("roman d'aventure");

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom('science-fiction');

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom('fantasy');

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom('biographie');

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom('conte');

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom('témoignage');

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom('théâtre');

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom('essai');

        $manager->persist($genre);
        $genres[] = $genre;

        $genres = [];
        $genre = new Genre();
        $genre->setNom('journal intime');

        $manager->persist($genre);
        $genres[] = $genre;
    }

    public function loadEmprunteur(ObjectManager $manager, int $count)
    {
        $emprunteurs = [];
        $emprunteur = new Emprunteur();
        $emprunteur->setNom('foo');
        $emprunteur->setPrenom('foo');
        $emprunteur->setTel('123456789');
        $emprunteur->setActif(true);
        $emprunteur->setDateCreation('20200101 10:00:00');

        $manager->persist($emprunteur);
        $emprunteurs[] = $emprunteur;

        for($i = 1; $i < $count; i++) {
            $emprunteurs = [];
            $emprunteur = new Emprunteur();
            $emprunteur->setNom($this->faker->lastname());
            $emprunteur->setPrenom($this->faker->firstname());
            $emprunteur->setTel($this->faker->phoneNumber());
            $emprunteur->setActif($this->faker->boolean());
            $emprunteur->setDateCreation('20200101 10:00:00');

            $manager->persist($emprunteur);
            $emprunteurs[] = $emprunteur;
            }
    }

    public function loadEmprunt(ObjectManager $manager, int $count)
    {
        $emprunts = [];
        $emprunt = new Emprunt();
        $emprunt->setDateEmprunt('2020-02-01 10:00:00');
        $emprunt->setDateRetour('2020-03-01 10:00:00');

        $manager->persist($emprunt);
        $emprunts[] = $emprunt;
    }
    
}
