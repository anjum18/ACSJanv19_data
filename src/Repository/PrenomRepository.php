<?php

namespace App\Repository;

use App\Entity\Prenom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Prenom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prenom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prenom[]    findAll()
 * @method Prenom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrenomRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Prenom::class);
    }

    // /**
    //  * @return Prenom[] Returns an array of Prenom objects
    //  */
    
    // public function findByExampleField($value)
    // {
    //     return $this->createQueryBuilder('p')
    //         ->andWhere('p.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('p.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

    /**
     * @return Prenom[] Returns an array of Prenom objects
     */
    
    public function findMaxByYear($value, $valeur)
    {
        return $this->createQueryBuilder('p')
            ->where('p.annee = :annee')
            ->andwhere('p.genre = :genre')
            ->setParameters(['annee'=> $value, 
                'genre' => $valeur])
            ->orderBy('p.nombre', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;
    
    }    
    public function findMinByYear($value, $valeur)
    {
        return $this->createQueryBuilder('p')
            ->where('p.annee = :annee')
            ->andwhere('p.genre = :genre')
            ->setParameter('annee',$value)
            ->setParameter('genre',$valeur)
            ->orderBy('p.nombre', 'ASC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;
    
    }  
    public function findByNomLike($q)
    {

        return $this->createQueryBuilder('p')
            ->select('p.id')

            ->select('DISTINCT p.nom')

            ->where('p.nom LIKE :nom')
            ->setParameter('nom',$q.'%')

            ->setMaxResults(50)
            ->getQuery()
            ->getResult()
        ;
    
    }  
      public function howManyForYear($nom, $date)
    {

        return $this->createQueryBuilder('p')
            ->where('p.annee = :annee')
            ->andwhere('p.nom = :nom')
            ->setParameter('annee',$date)
            ->setParameter('nom',$nom)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    
    }  
      public function SearchYearByName($nom)
    {

        return $this->createQueryBuilder('p')
            ->select('p.annee')
            ->where('p.nom = :nom')
            // ->andwhere('p.nom = :nom')
            ->setParameter('nom',$nom)
            ->setMaxResults(117)
            ->getQuery()
            ->getResult()
        ;
    
    } 
    /*
    public function findOneBySomeField($value): ?Prenom
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
