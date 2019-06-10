<?php

namespace App\Repository;

use App\Entity\ServiceData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ServiceData|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceData|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceData[]    findAll()
 * @method ServiceData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceDataRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServiceData::class);
    }

    // /**
    //  * @return ServiceData[] Returns an array of ServiceData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServiceData
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
