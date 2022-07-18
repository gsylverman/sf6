<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{

    public function __construct(private readonly EntityManagerInterface $em)
    {
    }

    #[Route('/movies', name: 'movies')]
    public function index(): Response
    {
        $repository = $this->em->getRepository(Movie::class);
        $movies = $repository->findAll();

        return $this->render('index.html.twig', [
            'movies' => $movies,
        ]);
    }

    #[Route('/second', name: 'second')]
    public function second(): Response
    {
        $repository = $this->em->getRepository(Actor::class);
        $actors = $repository->findAll();

        dd($actors);

        return $this->render('index.html.twig', [
            'actors' => $actors,
        ]);
    }
}
