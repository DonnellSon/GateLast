<?php
namespace App\Service;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Invest;
use App\Entity\Company;
use App\Entity\CompanySize;
use App\Entity\CompanyType;
use App\Entity\Domaine;
use App\Entity\Gender;
use App\Entity\Language;
use App\Entity\Pays;
use App\Entity\PaysCultures;
use App\Entity\PaysDemog;
use App\Entity\PaysEconomy;
use App\Entity\PaysGeography;
use App\Entity\PaysGouvernment;
use App\Entity\PaysHistory;
use App\Entity\Religion;
use Doctrine\ORM\EntityManagerInterface;

class GlobalSearchService
{
   private $em;

   public function __construct(EntityManagerInterface $em)
   {
       $this->em = $em;
   }

   public function search($query)
{
   $results = [];

   // $qb = $this->em->createQueryBuilder();

   // $qb->select('c', 't', 's')
   //    ->from('App\Entity\Company', 'c')
   //    ->leftJoin('c.companyType', 't')
   //    ->leftJoin('c.companySize', 's')
   //    ->where($qb->expr()->orX(
   //        $qb->expr()->like('c.name', ':query'),
   //        $qb->expr()->like('c.adress', ':query'),
   //        $qb->expr()->like('c.pays', ':query'),
   //        $qb->expr()->like('c.nifStat', ':query'),
   //        $qb->expr()->like('c.description', ':query'),
   //        $qb->expr()->like('c.numero', ':query'),
   //        $qb->expr()->like('c.webSite', ':query'),
   //        $qb->expr()->like('c.email', ':query'),

   //        $qb->expr()->like('t.type', ':query'),

   //        $qb->expr()->like('s.size', ':query'),
   //    ))
   //    ->setParameter('query', '%' . $query . '%');

   // $qb->select('u', 'g', 's')
   // ->from('App\Entity\User', 'u')
   // ->leftJoin('u.gender', 'g')
   // ->leftJoin('u.invest', 'i')
   // ->where($qb->expr()->orX(
   //     $qb->expr()->like('u.firstName', ':query'),
   //     $qb->expr()->like('u.lastName', ':query'),
   //     $qb->expr()->like('u.birthDate', ':query'),

   //     $qb->expr()->like('g.title', ':query'),

   //      $qb->expr()->like('i.title', ':queri'),
   //      $qb->expr()->like('i.description', ':queri'),
   //      $qb->expr()->like('i.need', ':queri'),
   //      $qb->expr()->like('i.collected', ':queri'),
   // ))
   // ->setParameter('query', '%' . $query . '%');
   
   // $results = $qb->getQuery()->getResult();
   



   // Search in Company
   $results['companies'] = $this->em->getRepository(Company::class)->createQueryBuilder('c')
    ->leftJoin('c.domaine', 'd')
       ->where('c.name LIKE :query or d.title LIKE :query')
       ->orWhere('c.adress LIKE :query')
       ->orWhere('c.pays LIKE :query')
       ->orWhere('c.nifStat LIKE :query')
       ->orWhere('c.description LIKE :query')
       ->orWhere('c.numero LIKE :query')
       ->orWhere('c.webSite LIKE :query')
       ->orWhere('c.email LIKE :query')
       ->setParameter('query', '%' . $query . '%')
       ->getQuery()
       ->getResult();

    

    // Search in Gender
    $results['user'] = $this->em->getRepository(Gender::class)->createQueryBuilder('u')
        ->Where('u.title Like :query')
        ->setParameter('query', '%' . $query . '%')
        ->getQuery()
        ->getResult();
      
   // Search in Gender
    $results['user'] = $this->em->getRepository(Gender::class)->createQueryBuilder('u')
        ->Where('u.title Like :query')
        ->setParameter('query', '%' . $query . '%')
        ->getQuery()
        ->getResult();

   // Search in Post
   $results['posts'] = $this->em->getRepository(Post::class)->createQueryBuilder('p')
       ->where('p.content LIKE :query')
       ->setParameter('query', '%' . $query . '%')
       ->getQuery()
       ->getResult();

   // Search in Invest
   $results['invest'] = $this->em->getRepository(Invest::class)->createQueryBuilder('i')
       ->where('i.title LIKE :query')
       ->setParameter('query', '%' . $query . '%')
       ->getQuery()
       ->getResult();

   // Search in Pays
   $results['pays'] = $this->em->getRepository(Pays::class)->createQueryBuilder('co')
       ->where('co.name LIKE :query')
       ->setParameter('query', '%' . $query . '%')
       ->getQuery()
       ->getResult();
    
   // Search in PaysCulture
   $results['pays'] = $this->em->getRepository(PaysCultures::class)->createQueryBuilder('pc')
       ->where('pc.extraData LIKE :query')
       ->setParameter('query', '%' . $query . '%')
       ->getQuery()
       ->getResult();

  // Search in PaysDemog
       $results['pays'] = $this->em->getRepository(PaysDemog::class)->createQueryBuilder('pd')
       ->where('pd.extraData LIKE :query')
       ->setParameter('query', '%' . $query . '%')
       ->getQuery()
       ->getResult();

  // Search in PaysEconomy
    $results['pays'] = $this->em->getRepository(PaysEconomy::class)->createQueryBuilder('pe')
        ->where('pe.extraData LIKE :query')
        ->setParameter('query', '%' . $query . '%')
        ->getQuery()
        ->getResult();

      // Search in PaysGeography
      $results['pays'] = $this->em->getRepository(PaysGeography::class)->createQueryBuilder('pg')
      ->where('pg.extraData LIKE :query')
      ->setParameter('query', '%' . $query . '%')
      ->getQuery()
      ->getResult();

     // Search in PaysGouvernment
    $results['pays'] = $this->em->getRepository(PaysGouvernment::class)->createQueryBuilder('pg2')
        ->where('pg2.extraData LIKE :query')
        ->setParameter('query', '%' . $query . '%')
        ->getQuery()
        ->getResult();

    // Search in PaysHistory
    $results['pays'] = $this->em->getRepository(PaysHistory::class)->createQueryBuilder('ph')
    ->where('ph.extraData LIKE :query')
    ->setParameter('query', '%' . $query . '%')
    ->getQuery()
    ->getResult();

    // Search in religion
    $results['religion'] = $this->em->getRepository(Religion::class)->createQueryBuilder('pr')
    ->where('pr.religion LIKE :query')
    ->setParameter('query', '%' . $query . '%')
    ->getQuery()
    ->getResult();

   // Search in Language
   $results['pays'] = $this->em->getRepository(Language::class)->createQueryBuilder('co')
       ->where('co.language LIKE :query')
       ->setParameter('query', '%' . $query . '%')
       ->getQuery()
       ->getResult();

    // Search in Domaine
   $results['domaine'] = $this->em->getRepository(Domaine::class)->createQueryBuilder('d')
   ->where('d.title LIKE :query')
   ->setParameter('query', '%' . $query . '%')
   ->getQuery()
   ->getResult();

// Exemple 
// $results[''] = $this->em->getRepository(Domaine::class)->createQueryBuilder('d')
//    ->where('d.title LIKE :query')
//    ->orWhere('d.column2 LIKE :query')
//    ->orWhere('d.column3 LIKE :query')
//    ->orWhere('d.column4 LIKE :query')
//    ->setParameter('query', '%' . $query . '%')
//    ->getQuery()
//    ->getResult();


   return $results;
}

}
