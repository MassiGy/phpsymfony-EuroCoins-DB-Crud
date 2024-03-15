<?php

namespace App\Repository;

use App\Entity\P06Collectionneur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<P06Collectionneur>
 *
 * @method P06Collectionneur|null find($id, $lockMode = null, $lockVersion = null)
 * @method P06Collectionneur|null findOneBy(array $criteria, array $orderBy = null)
 * @method P06Collectionneur[]    findAll()
 * @method P06Collectionneur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class P06CollectionneurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, P06Collectionneur::class);
    }

    public function add(P06Collectionneur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(P06Collectionneur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return P06Collectionneur[] Returns an array of P06Collectionneur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?P06Collectionneur
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
