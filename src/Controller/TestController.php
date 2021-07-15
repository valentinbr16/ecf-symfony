<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Entity\Emprunt;
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

        // $emprunts = $empruntRepository->findLastTen();
        // dump($emprunts);

        // $emprunts = $empruntRepository->findByEmprunteurId(2);
        // dump($emprunts);

        // $emprunts = $empruntRepository->findByLivreId(3);
        // dump($emprunts);

        // $emprunts = $empruntRepository->findByDateRetour('2021-01-01 00:00:00');
        // dump($emprunts);

        // $emprunts = $empruntRepository->findEmpruntsNonRendus();
        // dump($emprunts);

        // // Changer la date_retour sur PHPMyAdmin si non nulle
        // $emprunt = $empruntRepository->findOneByLivreIdAndDateRetour(3);
        // dump($emprunt);

        //-----------------------------------------------------
        
        // $emprunteurs = $emprunteurRepository->findAll();
        // $livres = $livreRepository->findAll();

        // $emprunt = new Emprunt();
        // $emprunt->setDateEmprunt(\DateTime::createFromFormat('Y-m-d H:i:s', '2020-12-01 16:00:00'));
        // $emprunt->setDateRetour(NULL);
        // $emprunt->setEmprunteur($emprunteurs[0]);
        // $emprunt->setLivre($livres[0]);

        // $entityManager->flush();
        // dump($emprunt);

        //-----------------------------------------------------

        // $emprunt = $empruntRepository->findById(3)[0];
        // dump($emprunt);

        // $emprunt->setDateRetour(\DateTime::createFromFormat('Y-m-d H:i:s', '2020-05-01 10:00:00'));

        // $entityManager->flush();
        // dump($emprunt);

        //-----------------------------------------------------

        // $emprunt = $empruntRepository->findById(42)[0];
        // dump($emprunt);

        // $entityManager->remove($emprunt);
        // $entityManager->flush();
        // // dump($emprunt); // retourne une erreur, donc le livre a bien été supprimé

        exit();
    }
}
