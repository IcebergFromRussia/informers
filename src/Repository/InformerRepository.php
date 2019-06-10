<?php

namespace App\Repository;

use App\Entity\Informer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Informer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Informer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Informer[]    findAll()
 * @method Informer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Informer::class);
    }

    // /**
    //  * @return Informer[] Returns an array of Informer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Informer
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
