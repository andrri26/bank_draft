<?php

namespace App\Repository;

use App\Entity\Cheque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cheque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cheque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cheque[]    findAll()
 * @method Cheque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChequeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cheque::class);
    }



    public function findByBank($value)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('count(c.id)')
            ->where('c.bank = :b')
            ->setParameter('b',$value);

        $query = $qb->getQuery();

        return $query->getSingleScalarResult();
    }

// /**
//  * @return Cheque[] Returns an array of Cheque objects
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


    /*
    public function findOneBySomeField($value): ?Cheque
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
