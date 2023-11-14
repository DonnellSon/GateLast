<?php

namespace App\Controller;

use App\Service\MeteoConceptService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WeatherController extends AbstractController
{
    private $meteoConceptService;

    public function __construct(MeteoConceptService $meteoConceptService)
    {
        $this->meteoConceptService = $meteoConceptService;
    }

    #[Route('/weather/{location}', name: 'weather')]
    public function weather(string $location): Response
    {
        $weather = $this->meteoConceptService->getWeather($location);

        return $this->json($weather);
    }
}
