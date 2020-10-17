<?php

namespace App\Repository;

use App\Entity\Utilisateur;
use App\Entity\UtilisateurSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Utilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateur[]    findAll()
 * @method Utilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }

    /**
     * @param UtilisateurSearch $search
     * @return Query
     */
    public function findAllVisibleQuery(UtilisateurSearch $search): Query
    {
        $query = $this->defaultQuery();

        if ($search->getPseudonyme()) {
            $query = $query
                ->andWhere('u.id like :search')
                ->setParameter('search', $search->getPseudonyme().'%');
        }

        if ($search->getRoles()->count() > 0) {
            $i = 0;
            foreach ($search->getRoles() as $role) {
                $i++;
                $query = $query
                    ->andWhere(":role$i MEMBER OF u.utiRoles")
                    ->setParameter("role$i", $role);
            }
        }

        return $query->getQuery();
    }

    public function countAll() : string
    {
        return $this->defaultQuery()
            ->select('COUNT(u)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    private function defaultQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('u');
    }

    // /**
    //  * @return Utilisateur[] Returns an array of Utilisateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Utilisateur
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
