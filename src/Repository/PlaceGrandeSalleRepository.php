<?php

namespace App\Repository;

use App\Entity\PlaceGrandeSalle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlaceGrandeSalle|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlaceGrandeSalle|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlaceGrandeSalle[]    findAll()
 * @method PlaceGrandeSalle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaceGrandeSalleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlaceGrandeSalle::class);
    }

    // /**
    //  * @return PlaceGrandeSalle[] Returns an array of PlaceGrandeSalle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlaceGrandeSalle
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
