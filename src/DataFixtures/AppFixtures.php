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

    // public static function getGroups(): array
    // {
    //     return ['test'];
    // }

    public function load(ObjectManager $manager)
    {
        $livresCount = 1000;
        $auteursCount = 500;
        $emprunteursCount = 100;
        $empruntsCount = 200;

        $user = $this->loadUser($manager);
        $auteurs = $this->loadAuteur($manager, $auteursCount);
        $genres = $this->loadGenre($manager);
        $emprunts = $this->loadEmprunt($manager, $empruntsCount);
        $livres = $this->loadLivre($manager, $auteurs, $genres, $emprunts, $livresCount);
        $emprunteurs = $this->loadEmprunteur($manager, $emprunteursCount);


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

    public function loadAuteur(ObjectManager $manager, int $count)
    {
        $auteurs = [];
        $auteur = new Auteur();
        $auteur->setNom('auteur');
        $auteur->setPrenom('inconnu');

        $manager->persist($auteur);
        $auteurs[] = $auteur;

        for($i = 1; $i < $count; $i++) {
            $auteurs = [];
            $auteur = new Auteur();
            $auteur->setNom($this->faker->lastname());
            $auteur->setPrenom($this->faker->firstname());
            

            $manager->persist($auteur);
            $auteurs[] = $auteur;
            }
        
        return $auteurs;
    }

    
    public function loadLivre(ObjectManager $manager, array $auteursParam, array $genresParam, array $empruntParam, int $count)
    {
        $livres = [];

        $auteur = $auteursParam[0];
        $genre = $genresParam[0];
        $emprunt = $empruntParam[0];

        $isbn = '9785786930024';

        $livre = new Livre();
        $livre->setTitre('Lorem ipsum dolor sit amet');
        $livre->setAnneeEdition(2010);
        $livre->setNombrePages(100);
        $livre->setCodeIsbn('9785786930024');
        $livre->setAuteur($auteur);
        $livre->addGenre($genre);
        $livre->addEmprunt($emprunt);

        $manager->persist($livre);
        $livres[] = $livre;

        for($i = 1; $i < $count; $i++) {
        $livre = new Livre();
        $livre->setTitre($this->faker->sentence(2));
        $livre->setAnneeEdition($this->faker->numberBetween($min = 1950, $max = 2021));
        $livre->setNombrePages($this->faker->numberBetween($min = 30, $max = 1000));
        $livre->setCodeIsbn($isbn + $i);
        // @todo  2 random livre per auteur 
        $livre->setAuteur($auteur);
        $livre->addGenre($genresParam[$this->faker->numberBetween($min = 0, $max = 12)]);
        // @todo random emprunteur
        $livre->addEmprunt($emprunt);

        $manager->persist($livre);
        $livres[] = $livre;
        }
    }


    public function loadGenre(ObjectManager $manager)
    {
        $genres = [];
        $genre = new Genre();
        $genre->setNom('poésie');

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom('nouvelle');

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom('roman historique');

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom("roman d'amour");

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom("roman d'aventure");

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom('science-fiction');

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom('fantasy');

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom('biographie');

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom('conte');

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom('témoignage');

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom('théâtre');

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom('essai');

        $manager->persist($genre);
        $genres[] = $genre;

        $genre = new Genre();
        $genre->setNom('journal intime');

        $manager->persist($genre);
        $genres[] = $genre;

        return $genres;
    }

    public function loadEmprunteur(ObjectManager $manager, int $count)
    {
        $emprunteurs = [];
        $emprunteur = new Emprunteur();
        $emprunteur->setNom('foo');
        $emprunteur->setPrenom('foo');
        $emprunteur->setTel('123456789');
        $emprunteur->setActif(true);
        $emprunteur->setDateCreation(\DateTime::createFromFormat('Y-m-d H:i:s', '2020-01-01 10:00:00'));

        $manager->persist($emprunteur);
        $emprunteurs[] = $emprunteur;

        for($i = 1; $i < $count; $i++) {
            $emprunteurs = [];
            $emprunteur = new Emprunteur();
            $emprunteur->setNom($this->faker->lastname());
            $emprunteur->setPrenom($this->faker->firstname());
            $emprunteur->setTel($this->faker->phoneNumber());
            $emprunteur->setActif($this->faker->boolean());
            $emprunteur->setDateCreation(\DateTime::createFromFormat('Y-m-d H:i:s', '2010-01-01 00:00:00'));
            // @todo $emprunteur->setUser  Rajouter les roles aux emprunteurs

            $manager->persist($emprunteur);
            $emprunteurs[] = $emprunteur;
            }
    }

    public function loadEmprunt(ObjectManager $manager, int $count)
    {
        $emprunts = [];
        $emprunt = new Emprunt();
        $emprunt->setDateEmprunt(\DateTime::createFromFormat('Y-m-d H:i:s', '2020-02-01 10:00:00'));
        $emprunt->setDateRetour(\DateTime::createFromFormat('Y-m-d H:i:s', '2020-03-01 10:00:00'));

        $manager->persist($emprunt);
        $emprunts[] = $emprunt;

        for($i = 1; $i < $count; $i++) {
            $emprunts = [];
            $emprunt = new Emprunt();
            $emprunt->setDateEmprunt($this->faker->dateTimeThisYear($max = 'now', $timezone =null));
            $emprunt->setDateRetour($this->faker->dateTimeThisYear($max = 'now', $timezone =null));

            $manager->persist($emprunt);
            $emprunts[] = $emprunt;
            }

        return $emprunts;
    }
    
}
