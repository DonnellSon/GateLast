<?php

namespace App\Repository;

use App\Entity\GlobalSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GlobalSearch>
 *
 * @method GlobalSearch|null find($id, $lockMode = null, $lockVersion = null)
 * @method GlobalSearch|null findOneBy(array $criteria, array $orderBy = null)
 * @method GlobalSearch[]    findAll()
 * @method GlobalSearch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlobalSearchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GlobalSearch::class);
    }

//    /**
//     * @return GlobalSearch[] Returns an array of GlobalSearch objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GlobalSearch
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
