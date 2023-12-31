<?php

namespace App\Repository;

use App\Entity\Loisirs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Loisirs>
 *
 * @method Loisirs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Loisirs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Loisirs[]    findAll()
 * @method Loisirs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoisirsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Loisirs::class);
    }

//    /**
//     * @return Loisirs[] Returns an array of Loisirs objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Loisirs
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
