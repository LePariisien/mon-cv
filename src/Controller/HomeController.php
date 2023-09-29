<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\ExperiencePro;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Récupérez l'utilisateur avec l'ID 1 depuis la base de données
        $userRepository = $this->entityManager->getRepository(User::class);
        $user = $userRepository->find(1);

        $experiences = $this->entityManager->getRepository(ExperiencePro::class)->createQueryBuilder('exp')
        ->where('exp.user = :user_id')
        ->setParameter('user_id', 1)
        ->getQuery()
        ->getResult();

        return $this->render('home/index.html.twig', [
            'user' => $user,
            'experiences' => $experiences,
        ]);
    }
}

