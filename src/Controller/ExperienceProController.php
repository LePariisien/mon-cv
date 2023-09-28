<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExperienceProController extends AbstractController
{
    #[Route('/experience/pro', name: 'app_experience_pro')]
    public function index(): Response
    {
        return $this->render('experience_pro/index.html.twig', [
            'controller_name' => 'ExperienceProController',
        ]);
    }
}
