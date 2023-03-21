<?php

namespace App\Repository;

use App\Entity\DrawerSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DrawerSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method DrawerSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method DrawerSettings[]    findAll()
 * @method DrawerSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DrawerSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DrawerSettings::class);
    }

    // /**
    //  * @return DrawerSettings[] Returns an array of DrawerSettings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DrawerSettings
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
