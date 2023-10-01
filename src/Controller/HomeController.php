<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\ExperiencePro;
use App\Entity\ExperienceEtudiant;
use App\Repository\ExperienceEtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index( ExperienceEtudiantRepository $experienceEtudiantRepository): Response
    {
        // Récupérez l'utilisateur avec l'ID 1 depuis la base de données
        $userRepository = $this->entityManager->getRepository(User::class);
        $user = $userRepository->find(1);

        $experiences = $this->entityManager->getRepository(ExperiencePro::class)->createQueryBuilder('exp')
        ->where('exp.user = :user_id')
        ->setParameter('user_id', 1)
        ->getQuery()
        ->getResult();

        $experiences_etu = $this->entityManager->getRepository(ExperienceEtudiant::class)->createQueryBuilder('exp')
        ->where('exp.user = :user_id')
        ->setParameter('user_id', 1)
        ->getQuery()
        ->getResult();

        // Récupérez les expériences étudiantes
        $yearsEtudiant = $experienceEtudiantRepository->findAll();

        // Initialisez un tableau pour stocker les années de début uniques
        $years = [];
    
        // Parcourez les expériences et récupérez les années de début
        foreach ($yearsEtudiant as $yearEtudiant) {
            $startYear = $yearEtudiant->getDatedebut()->format('Y');
                
            // Assurez-vous que l'année n'est pas déjà dans le tableau
            if (!in_array($startYear, $years)) {
                $years[] = $startYear;
            }
        }
    

        $years = array_reverse($years);

        // Triez les années par ordre croissant
        sort($years);

        return $this->render('home/index.html.twig', [
            'user' => $user,
            'experiences' => $experiences,
            'experiences_etu' => $experiences_etu,
            'yearsEtudiant' => $yearsEtudiant,
            'years' => $years,
        ]);
    }
}

