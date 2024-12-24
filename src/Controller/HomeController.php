<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\EmployeeRepository;
use App\Repository\WorkplaceRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EmployeeRepository $employeeRepository, WorkplaceRepository $workplaceRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'employees' => $employeeRepository->findAll(),
            'workplaces' => $workplaceRepository->findAll(),
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
