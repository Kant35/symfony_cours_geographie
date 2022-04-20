<?php

namespace App\Controller;

use App\Entity\Capitale;
use App\Form\CapitaleType;
use App\Repository\CapitaleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/capitale")
 */
class CapitaleController extends AbstractController
{
    /**
     * @Route("/", name="capitale_index", methods={"GET"})
     */
    public function index(CapitaleRepository $capitaleRepository): Response
    {
        return $this->render('capitale/index.html.twig', [
            'capitales' => $capitaleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="capitale_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $capitale = new Capitale();
        $form = $this->createForm(CapitaleType::class, $capitale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($capitale);
            $entityManager->flush();

            return $this->redirectToRoute('capitale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('capitale/new.html.twig', [
            'capitale' => $capitale,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="capitale_show", methods={"GET"})
     */
    public function show(Capitale $capitale): Response
    {
        return $this->render('capitale/show.html.twig', [
            'capitale' => $capitale,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="capitale_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Capitale $capitale, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CapitaleType::class, $capitale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('capitale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('capitale/edit.html.twig', [
            'capitale' => $capitale,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="capitale_delete", methods={"POST"})
     */
    public function delete(Request $request, Capitale $capitale, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$capitale->getId(), $request->request->get('_token'))) {
            $entityManager->remove($capitale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('capitale_index', [], Response::HTTP_SEE_OTHER);
    }
}
