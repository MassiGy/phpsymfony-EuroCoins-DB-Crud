<?php

namespace App\Controller;

use App\Entity\P06PieceTranche;
use App\Form\P06PieceTrancheType;
use App\Repository\P06PieceTrancheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/piece/tranche")
 */
class PieceTrancheController extends AbstractController
{
    /**
     * @Route("/", name="app_piece_tranche_index", methods={"GET"})
     */
    public function index(P06PieceTrancheRepository $p06PieceTrancheRepository): Response
    {
        return $this->render('piece_tranche/index.html.twig', [
            'p06_piece_tranches' => $p06PieceTrancheRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_piece_tranche_new", methods={"GET", "POST"})
     */
    public function new(Request $request, P06PieceTrancheRepository $p06PieceTrancheRepository): Response
    {
        $p06PieceTranche = new P06PieceTranche();
        $form = $this->createForm(P06PieceTrancheType::class, $p06PieceTranche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $p06PieceTrancheRepository->add($p06PieceTranche, true);

            return $this->redirectToRoute('app_piece_tranche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_tranche/new.html.twig', [
            'p06_piece_tranche' => $p06PieceTranche,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_piece_tranche_show", methods={"GET"})
     */
    public function show(P06PieceTranche $p06PieceTranche): Response
    {
        return $this->render('piece_tranche/show.html.twig', [
            'p06_piece_tranche' => $p06PieceTranche,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_piece_tranche_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, P06PieceTranche $p06PieceTranche, P06PieceTrancheRepository $p06PieceTrancheRepository): Response
    {
        $form = $this->createForm(P06PieceTrancheType::class, $p06PieceTranche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $p06PieceTrancheRepository->add($p06PieceTranche, true);

            return $this->redirectToRoute('app_piece_tranche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_tranche/edit.html.twig', [
            'p06_piece_tranche' => $p06PieceTranche,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_piece_tranche_delete", methods={"POST"})
     */
    public function delete(Request $request, P06PieceTranche $p06PieceTranche, P06PieceTrancheRepository $p06PieceTrancheRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$p06PieceTranche->getId(), $request->request->get('_token'))) {
            $p06PieceTrancheRepository->remove($p06PieceTranche, true);
        }

        return $this->redirectToRoute('app_piece_tranche_index', [], Response::HTTP_SEE_OTHER);
    }
}
