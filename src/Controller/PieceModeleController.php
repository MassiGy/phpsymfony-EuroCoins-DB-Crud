<?php

namespace App\Controller;

use App\Entity\P06PieceModele;
use App\Form\P06PieceModeleType;
use App\Repository\P06PieceModeleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/piece/modele")
 */
class PieceModeleController extends AbstractController
{
    /**
     * @Route("/", name="app_piece_modele_index", methods={"GET"})
     */
    public function index(P06PieceModeleRepository $p06PieceModeleRepository): Response
    {
        return $this->render('piece_modele/index.html.twig', [
            'p06_piece_modeles' => $p06PieceModeleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_piece_modele_new", methods={"GET", "POST"})
     */
    public function new(Request $request, P06PieceModeleRepository $p06PieceModeleRepository): Response
    {
        $p06PieceModele = new P06PieceModele();
        $form = $this->createForm(P06PieceModeleType::class, $p06PieceModele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $p06PieceModeleRepository->add($p06PieceModele, true);

            return $this->redirectToRoute('app_piece_modele_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_modele/new.html.twig', [
            'p06_piece_modele' => $p06PieceModele,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_piece_modele_show", methods={"GET"})
     */
    public function show(P06PieceModele $p06PieceModele): Response
    {
        return $this->render('piece_modele/show.html.twig', [
            'p06_piece_modele' => $p06PieceModele,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_piece_modele_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, P06PieceModele $p06PieceModele, P06PieceModeleRepository $p06PieceModeleRepository): Response
    {
        $form = $this->createForm(P06PieceModeleType::class, $p06PieceModele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $p06PieceModeleRepository->add($p06PieceModele, true);

            return $this->redirectToRoute('app_piece_modele_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_modele/edit.html.twig', [
            'p06_piece_modele' => $p06PieceModele,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_piece_modele_delete", methods={"POST"})
     */
    public function delete(Request $request, P06PieceModele $p06PieceModele, P06PieceModeleRepository $p06PieceModeleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$p06PieceModele->getId(), $request->request->get('_token'))) {
            $p06PieceModeleRepository->remove($p06PieceModele, true);
        }

        return $this->redirectToRoute('app_piece_modele_index', [], Response::HTTP_SEE_OTHER);
    }
}
