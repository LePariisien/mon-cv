<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoisirsController extends AbstractController
{
    #[Route('/loisirs', name: 'app_loisirs')]
    public function index(): Response
    {

        return $this->render('loisirs/index.html.twig', [
        ]);
    }
}
