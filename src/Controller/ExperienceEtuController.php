<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ExperienceEtudiant; // Importe la classe ExperiencePro
use Doctrine\ORM\EntityManagerInterface;

class ExperienceEtuController extends AbstractController
{
    #[Route('/experience/etu', name: 'app_experience_etu')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Réutilise le code pour récupérer les expériences professionnelles (à personnaliser si nécessaire)
        $experiences_etu = $entityManager->getRepository(ExperienceEtudiant::class)->createQueryBuilder('exp')
        ->where('exp.user = :user_id')
        ->setParameter('user_id', 1)
        ->getQuery()
        ->getResult();

        return $this->render('experience_etu/index.html.twig', [
            'experiences' => $experiences_etu,
        ]);
    }
}
