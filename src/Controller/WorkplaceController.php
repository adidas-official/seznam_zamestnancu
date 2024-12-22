<?php

namespace App\Controller;

use App\Entity\Workplace;
use App\Form\WorkplaceType;
use App\Repository\WorkplaceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/workplace')]
final class WorkplaceController extends AbstractController
{
    #[Route(name: 'app_workplace_index', methods: ['GET'])]
    public function index(WorkplaceRepository $workplaceRepository): Response
    {
        return $this->render('workplace/index.html.twig', [
            'workplaces' => $workplaceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_workplace_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $workplace = new Workplace();
        $form = $this->createForm(WorkplaceType::class, $workplace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($workplace);
            $entityManager->flush();

            return $this->redirectToRoute('app_workplace_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('workplace/new.html.twig', [
            'workplace' => $workplace,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_workplace_show', methods: ['GET'])]
    public function show(Workplace $workplace): Response
    {
        return $this->render('workplace/show.html.twig', [
            'workplace' => $workplace,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_workplace_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Workplace $workplace, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(WorkplaceType::class, $workplace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_workplace_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('workplace/edit.html.twig', [
            'workplace' => $workplace,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_workplace_delete', methods: ['POST'])]
    public function delete(Request $request, Workplace $workplace, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$workplace->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($workplace);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_workplace_index', [], Response::HTTP_SEE_OTHER);
    }
}
