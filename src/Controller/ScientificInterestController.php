<?php

namespace App\Controller;

use App\Entity\ScientificInterest;
use App\Form\ScientificInterestType;
use App\Repository\ScientificInterestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scientific/interest")
 */
class ScientificInterestController extends AbstractController
{
    /**
     * @Route("/", name="scientific_interest_index", methods={"GET"})
     */
    public function index(ScientificInterestRepository $scientificInterestRepository): Response
    {
        return $this->render('scientific_interest/index.html.twig', [
            'scientific_interests' => $scientificInterestRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="scientific_interest_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $scientificInterest = new ScientificInterest();
        $form = $this->createForm(ScientificInterestType::class, $scientificInterest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($scientificInterest);
            $entityManager->flush();

            return $this->redirectToRoute('scientific_interest_index');
        }

        return $this->render('scientific_interest/new.html.twig', [
            'scientific_interest' => $scientificInterest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scientific_interest_show", methods={"GET"})
     */
    public function show(ScientificInterest $scientificInterest): Response
    {
        return $this->render('scientific_interest/show.html.twig', [
            'scientific_interest' => $scientificInterest,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="scientific_interest_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ScientificInterest $scientificInterest): Response
    {
        $form = $this->createForm(ScientificInterestType::class, $scientificInterest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scientific_interest_index');
        }

        return $this->render('scientific_interest/edit.html.twig', [
            'scientific_interest' => $scientificInterest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scientific_interest_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ScientificInterest $scientificInterest): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scientificInterest->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($scientificInterest);
            $entityManager->flush();
        }

        return $this->redirectToRoute('scientific_interest_index');
    }
}
