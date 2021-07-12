<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Repository\EmprunteurRepository;
use App\Repository\EmpruntRepository;
use App\Repository\LivreRepository;
use App\Repository\UserRepository;
use App\Repository\AuteurRepository;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(
        EmprunteurRepository $emprunteurRepository,
        EmpruntRepository $empruntRepository,
        LivreRepository $livreRepository,
        UserRepository $userRepository,
        AuteurRepository $auteurRepository,
        GenreRepository $genreRepository
    ): Response
    {
        // return $this->render('test/index.html.twig', [
        //     'controller_name' => 'TestController',
        // ]);

        $entityManager = $this->getDoctrine()->getManager();
        
        // $users = $userRepository->findAll();
        // dump($users);

        // $user = $userRepository->findOneById(1);
        // dump($user);

        // $user = $userRepository->findByEmail('foo.foo@example.com');
        // dump($user);

        // $usersRole = $userRepository->findByRole('ROLE_EMPRUNTEUR');
        // dump($usersRole);

        //---------------------------------------------

        // $livres = $livreRepository->findAll();
        // dump($livres);

        // $livre = $livreRepository->findById(1);
        // dump($livre);

        // $livres = $livreRepository->findByTitle('lorem');
        // dump($livres);

        // $livre = $livreRepository->findByAuteurId(2);
        // dump($livre);

        // $livres = $livreRepository->findByGenre('roman');
        // dump($livres);

        //------------------------------------------------

        // $auteurs = $auteurRepository->findAll();
        // $genres = $genreRepository->findAll();

        // $livre = new Livre();
        // $livre->setTitre('Totum autem id externum');
        // $livre->setAnneeEdition(2020);
        // $livre->setNombrePages(300);
        // $livre->setCodeIsbn('9790412882714');
        // $livre->setAuteur($auteurs[2]);
        // $livre->addGenre($genres[6]);

        // $entityManager->flush();
        // dump($livre);

        //-------------------------------------------------

        // $genres = $genreRepository->findAll();

        // $livre = $livreRepository->findById(2)[0];
        // dump($livre);

        // $livre->setTitre('Aperiendum est igitur');
        // $livre->removeGenre($genres[2]); // nouvelle
        // $livre->addGenre($genres[5]); // roman d'aventure

        // $entityManager->flush();
        // dump($livre);

        //--------------------------------------------------

        // $livre = $livreRepository->findById(123)[0];
        // dump($livre);

        // $entityManager->remove($livre);
        // $entityManager->flush();
        // dump($livre); // retourne une erreur, donc le livre a bien été supprimé

        //--------------------------------------------------

        // $emprunteur = $emprunteurRepository->findAll();
        // dump($emprunteur);

        // $emprunteur = $emprunteurRepository->findById(3);
        // dump($emprunteur);

        // $emprunteur = $emprunteurRepository->findByUserId(3);
        // dump($emprunteur);

        // $emprunteurs = $emprunteurRepository->findByFirstnameOrLastname('foo');
        // dump($emprunteurs);

        // $emprunteurs = $emprunteurRepository->findByTel('1234');
        // dump($emprunteurs);

        // $emprunteurs = $emprunteurRepository->findByCreationDate('2021-03-01 00:00:00');
        // dump($emprunteurs);

        // $emprunteurs = $emprunteurRepository->findByStatus(false);
        // dump($emprunteurs);

        //--------------------------------------------------

        // $emprunt = $empruntRepository->findLastTen();
        // dump($emprunt);

        exit();
    }
}
