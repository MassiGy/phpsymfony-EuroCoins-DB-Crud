<?php

namespace App\Controller;

use App\Entity\P06PiecePays;
use App\Form\P06PiecePaysType;
use App\Repository\P06PiecePaysRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/piece/pays")
 */
class PiecePaysController extends AbstractController
{
    /**
     * @Route("/", name="app_piece_pays_index", methods={"GET"})
     */
    public function index(P06PiecePaysRepository $p06PiecePaysRepository): Response
    {
        return $this->render('piece_pays/index.html.twig', [
            'p06_piece_pays' => $p06PiecePaysRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_piece_pays_new", methods={"GET", "POST"})
     */
    public function new(Request $request, P06PiecePaysRepository $p06PiecePaysRepository): Response
    {
        $p06PiecePay = new P06PiecePays();
        $form = $this->createForm(P06PiecePaysType::class, $p06PiecePay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $p06PiecePaysRepository->add($p06PiecePay, true);

            return $this->redirectToRoute('app_piece_pays_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_pays/new.html.twig', [
            'p06_piece_pay' => $p06PiecePay,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_piece_pays_show", methods={"GET"})
     */
    public function show(P06PiecePays $p06PiecePay): Response
    {
        return $this->render('piece_pays/show.html.twig', [
            'p06_piece_pay' => $p06PiecePay,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_piece_pays_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, P06PiecePays $p06PiecePay, P06PiecePaysRepository $p06PiecePaysRepository): Response
    {
        $form = $this->createForm(P06PiecePaysType::class, $p06PiecePay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $p06PiecePaysRepository->add($p06PiecePay, true);

            return $this->redirectToRoute('app_piece_pays_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_pays/edit.html.twig', [
            'p06_piece_pay' => $p06PiecePay,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_piece_pays_delete", methods={"POST"})
     */
    public function delete(Request $request, P06PiecePays $p06PiecePay, P06PiecePaysRepository $p06PiecePaysRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$p06PiecePay->getId(), $request->request->get('_token'))) {
            $p06PiecePaysRepository->remove($p06PiecePay, true);
        }

        return $this->redirectToRoute('app_piece_pays_index', [], Response::HTTP_SEE_OTHER);
    }
}
