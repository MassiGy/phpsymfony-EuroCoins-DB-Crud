<?php

namespace App\Repository;

use App\Entity\P06PieceModele;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<P06PieceModele>
 *
 * @method P06PieceModele|null find($id, $lockMode = null, $lockVersion = null)
 * @method P06PieceModele|null findOneBy(array $criteria, array $orderBy = null)
 * @method P06PieceModele[]    findAll()
 * @method P06PieceModele[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class P06PieceModeleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, P06PieceModele::class);
    }

    public function add(P06PieceModele $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(P06PieceModele $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return P06PieceModele[] Returns an array of P06PieceModele objects
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

//    public function findOneBySomeField($value): ?P06PieceModele
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
