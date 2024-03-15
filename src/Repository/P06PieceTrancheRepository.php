<?php

namespace App\Repository;

use App\Entity\P06PieceTranche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<P06PieceTranche>
 *
 * @method P06PieceTranche|null find($id, $lockMode = null, $lockVersion = null)
 * @method P06PieceTranche|null findOneBy(array $criteria, array $orderBy = null)
 * @method P06PieceTranche[]    findAll()
 * @method P06PieceTranche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class P06PieceTrancheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, P06PieceTranche::class);
    }

    public function add(P06PieceTranche $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(P06PieceTranche $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return P06PieceTranche[] Returns an array of P06PieceTranche objects
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

//    public function findOneBySomeField($value): ?P06PieceTranche
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
