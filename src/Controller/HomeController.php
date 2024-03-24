<?php

namespace App\Controller;

use App\Entity\P06PieceModele;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\P06PieceModeleRepository;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/piece_modeles", name="app_all_pieces_modeles")
     */
    public function getAllPieceModele(EntityManagerInterface $entityManager):Response 
    {
        $pmRepo = $entityManager->getRepository(P06PieceModele::class);

        return $pmRepo->find(10);

        // return new Response("hello there");
    }
}
