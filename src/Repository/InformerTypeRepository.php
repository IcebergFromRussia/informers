<?php

namespace App\Repository;

use App\Entity\InformerType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InformerType|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformerType|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformerType[]    findAll()
 * @method InformerType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformerTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InformerType::class);
    }

    // /**
    //  * @return InformerType[] Returns an array of InformerType objects
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
    public function findOneBySomeField($value): ?InformerType
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
