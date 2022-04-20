<?php

namespace App\Repository;

use App\Entity\Capitale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Capitale|null find($id, $lockMode = null, $lockVersion = null)
 * @method Capitale|null findOneBy(array $criteria, array $orderBy = null)
 * @method Capitale[]    findAll()
 * @method Capitale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CapitaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Capitale::class);
    }

    // /**
    //  * @return Capitale[] Returns an array of Capitale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Capitale
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
