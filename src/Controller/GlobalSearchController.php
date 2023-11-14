<?php

namespace App\Controller;

use App\Entity\GlobalSearch;
use App\Service\GlobalSearchService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GlobalSearchController extends AbstractController
{
    private $globalSearchService;

    public function __construct(GlobalSearchService $globalSearchService)
    {
        $this->globalSearchService = $globalSearchService;
    }
   
    #[Route('api/search', name: 'search', methods: ['GET'])]
    public function search(string $query): Response
    {
        $results = $this->globalSearchService->search($query);
   
        return $this->json($results);
    }
}
