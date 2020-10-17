<?php

namespace App\Repository;

use App\Entity\Lexique;
use App\Entity\LexiqueSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lexique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lexique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lexique[]    findAll()
 * @method Lexique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LexiqueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lexique::class);
    }
    public function findAllVisibleQuery(LexiqueSearch $search): Query
    {
        $query = $this->defaultQuery();

        if ($search->getMot()) {
            $query = $query
                ->andWhere('l.LexMot like :search')
                ->orderBy('l.LexMot')
                ->setParameter('search', $search->getMot().'%');
        }
        return $query->getQuery();
    }

    private function defaultQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('l')
            ;
    }

    // /**
    //  * @return Lexique[] Returns an array of Lexique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lexique
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
