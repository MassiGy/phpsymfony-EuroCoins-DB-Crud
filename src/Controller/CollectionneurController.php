<?php

namespace App\Controller;

use App\Entity\P06Collectionneur;
use App\Form\P06CollectionneurType;
use App\Repository\P06CollectionneurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/collectionneur")
 */
class CollectionneurController extends AbstractController
{
    /**
     * @Route("/", name="app_collectionneur_index", methods={"GET"})
     */
    public function index(P06CollectionneurRepository $p06CollectionneurRepository): Response
    {
        return $this->render('collectionneur/index.html.twig', [
            'p06_collectionneurs' => $p06CollectionneurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_collectionneur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, P06CollectionneurRepository $p06CollectionneurRepository): Response
    {
        $p06Collectionneur = new P06Collectionneur();
        $form = $this->createForm(P06CollectionneurType::class, $p06Collectionneur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $p06CollectionneurRepository->add($p06Collectionneur, true);

            return $this->redirectToRoute('app_collectionneur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('collectionneur/new.html.twig', [
            'p06_collectionneur' => $p06Collectionneur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_collectionneur_show", methods={"GET"})
     */
    public function show(P06Collectionneur $p06Collectionneur): Response
    {
        return $this->render('collectionneur/show.html.twig', [
            'p06_collectionneur' => $p06Collectionneur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_collectionneur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, P06Collectionneur $p06Collectionneur, P06CollectionneurRepository $p06CollectionneurRepository): Response
    {
        $form = $this->createForm(P06CollectionneurType::class, $p06Collectionneur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $p06CollectionneurRepository->add($p06Collectionneur, true);

            return $this->redirectToRoute('app_collectionneur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('collectionneur/edit.html.twig', [
            'p06_collectionneur' => $p06Collectionneur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_collectionneur_delete", methods={"POST"})
     */
    public function delete(Request $request, P06Collectionneur $p06Collectionneur, P06CollectionneurRepository $p06CollectionneurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$p06Collectionneur->getId(), $request->request->get('_token'))) {
            $p06CollectionneurRepository->remove($p06Collectionneur, true);
        }

        return $this->redirectToRoute('app_collectionneur_index', [], Response::HTTP_SEE_OTHER);
    }
}
