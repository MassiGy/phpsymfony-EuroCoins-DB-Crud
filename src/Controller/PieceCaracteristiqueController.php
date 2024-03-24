<?php

namespace App\Controller;

use App\Entity\P06PieceCaracteristique;
use App\Form\P06PieceCaracteristiqueType;
use App\Repository\P06PieceCaracteristiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/piece/caracteristique")
 */
class PieceCaracteristiqueController extends AbstractController
{
    /**
     * @Route("/", name="app_piece_caracteristique_index", methods={"GET"})
     */
    public function index(P06PieceCaracteristiqueRepository $p06PieceCaracteristiqueRepository): Response
    {
        return $this->render('piece_caracteristique/index.html.twig', [
            'p06_piece_caracteristiques' => $p06PieceCaracteristiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_piece_caracteristique_new", methods={"GET", "POST"})
     */
    public function new(Request $request, P06PieceCaracteristiqueRepository $p06PieceCaracteristiqueRepository): Response
    {
        $p06PieceCaracteristique = new P06PieceCaracteristique();
        $form = $this->createForm(P06PieceCaracteristiqueType::class, $p06PieceCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $p06PieceCaracteristiqueRepository->add($p06PieceCaracteristique, true);

            return $this->redirectToRoute('app_piece_caracteristique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_caracteristique/new.html.twig', [
            'p06_piece_caracteristique' => $p06PieceCaracteristique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_piece_caracteristique_show", methods={"GET"})
     */
    public function show(P06PieceCaracteristique $p06PieceCaracteristique): Response
    {
        return $this->render('piece_caracteristique/show.html.twig', [
            'p06_piece_caracteristique' => $p06PieceCaracteristique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_piece_caracteristique_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, P06PieceCaracteristique $p06PieceCaracteristique, P06PieceCaracteristiqueRepository $p06PieceCaracteristiqueRepository): Response
    {
        $form = $this->createForm(P06PieceCaracteristiqueType::class, $p06PieceCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $p06PieceCaracteristiqueRepository->add($p06PieceCaracteristique, true);

            return $this->redirectToRoute('app_piece_caracteristique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_caracteristique/edit.html.twig', [
            'p06_piece_caracteristique' => $p06PieceCaracteristique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_piece_caracteristique_delete", methods={"POST"})
     */
    public function delete(Request $request, P06PieceCaracteristique $p06PieceCaracteristique, P06PieceCaracteristiqueRepository $p06PieceCaracteristiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$p06PieceCaracteristique->getId(), $request->request->get('_token'))) {
            $p06PieceCaracteristiqueRepository->remove($p06PieceCaracteristique, true);
        }

        return $this->redirectToRoute('app_piece_caracteristique_index', [], Response::HTTP_SEE_OTHER);
    }
}
