<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ExperiencePro;
use Doctrine\ORM\EntityManagerInterface;

class ExperienceProController extends AbstractController
{
    #[Route('/experience/pro', name: 'app_experience_pro')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Récupérez les expériences professionnelles pour l'utilisateur ayant un user_id de 1
        $experiences = $entityManager->getRepository(ExperiencePro::class)->createQueryBuilder('exp')
        ->where('exp.user = :user_id')
        ->setParameter('user_id', 1)
        ->getQuery()
        ->getResult();

        return $this->render('experience_pro/index.html.twig', [
            'experiences' => $experiences,
        ]);
    }
}


