<?php

namespace App\Repository;

use App\Entity\ReservationSalon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReservationSalon|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReservationSalon|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReservationSalon[]    findAll()
 * @method ReservationSalon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationSalonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReservationSalon::class);
    }

    // /**
    //  * @return ReservationSalon[] Returns an array of ReservationSalon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReservationSalon
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
