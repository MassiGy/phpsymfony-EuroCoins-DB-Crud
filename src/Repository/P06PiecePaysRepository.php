<?php

namespace App\Repository;

use App\Entity\P06PiecePays;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<P06PiecePays>
 *
 * @method P06PiecePays|null find($id, $lockMode = null, $lockVersion = null)
 * @method P06PiecePays|null findOneBy(array $criteria, array $orderBy = null)
 * @method P06PiecePays[]    findAll()
 * @method P06PiecePays[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class P06PiecePaysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, P06PiecePays::class);
    }

    public function add(P06PiecePays $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(P06PiecePays $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return P06PiecePays[] Returns an array of P06PiecePays objects
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

//    public function findOneBySomeField($value): ?P06PiecePays
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
