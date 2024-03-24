<?php

namespace App\Repository;

use App\Entity\P06Collectionner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<P06Collectionner>
 *
 * @method P06Collectionner|null find($id, $lockMode = null, $lockVersion = null)
 * @method P06Collectionner|null findOneBy(array $criteria, array $orderBy = null)
 * @method P06Collectionner[]    findAll()
 * @method P06Collectionner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class P06CollectionnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, P06Collectionner::class);
    }

    public function add(P06Collectionner $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(P06Collectionner $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return P06Collectionner[] Returns an array of P06Collectionner objects
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

//    public function findOneBySomeField($value): ?P06Collectionner
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
