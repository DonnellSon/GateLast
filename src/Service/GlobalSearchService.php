<?php
namespace App\Service;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Invest;
use App\Entity\Company;
use App\Entity\JobOffer;
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

   // Search in Company
   $results['companies'] = $this->em->getRepository(Company::class)->createQueryBuilder('c')
       ->where('c.name LIKE :query')
       ->setParameter('query', '%' . $query . '%')
       ->getQuery()
       ->getResult();

   // Search in User
   $results['users'] = $this->em->getRepository(User::class)->createQueryBuilder('u')
       ->where('u.firstName LIKE :query')
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

   // Search in Job
   $results['jobs'] = $this->em->getRepository(JobOffer::class)->createQueryBuilder('j')
       ->where('j.title LIKE :query')
       ->setParameter('query', '%' . $query . '%')
       ->getQuery()
       ->getResult();

   return $results;
}
}
