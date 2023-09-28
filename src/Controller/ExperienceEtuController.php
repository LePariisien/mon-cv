<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExperienceEtuController extends AbstractController
{
    #[Route('/experience/etu', name: 'app_experience_etu')]
    public function index(): Response
    {
        return $this->render('experience_etu/index.html.twig', [
            'controller_name' => 'ExperienceEtuController',
        ]);
    }
}
