<?php

namespace App\Repository;

use App\Entity\ExperienceEtudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExperienceEtudiant>
 *
 * @method ExperienceEtudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExperienceEtudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExperienceEtudiant[]    findAll()
 * @method ExperienceEtudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExperienceEtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExperienceEtudiant::class);
    }

//    /**
//     * @return ExperienceEtudiant[] Returns an array of ExperienceEtudiant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ExperienceEtudiant
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
