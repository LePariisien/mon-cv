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
        $languages = [
            'Anglais' => 3.5,
            'Espagnol' => 3.5,
            'Portugais' => 2,
        ];

        $travelDestinations = ['États-Unis', 'Thaïlande', 'Canada', 'Europe'];
        $sports = ['Football', 'Tennis', 'Musculation'];

        return $this->render('loisirs/index.html.twig', [
            'languages' => $languages,
            'travelDestinations' => $travelDestinations,
            'sports' => $sports,
        ]);
    }
}
