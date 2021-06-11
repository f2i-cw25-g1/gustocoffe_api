<?php

namespace App\Repository;

use App\Entity\ReservationPlace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReservationPlace|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReservationPlace|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReservationPlace[]    findAll()
 * @method ReservationPlace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationPlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReservationPlace::class);
    }

    // /**
    //  * @return ReservationPlace[] Returns an array of ReservationPlace objects
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
    public function findOneBySomeField($value): ?ReservationPlace
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
