<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class MeteoConceptService
{
    private $client;
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    public function getWeather(string $location)
    {
        $response = $this->client->request(
            'GET',
            'https://api.meteo-concept.com/prevision',
            [
                'query' => [
                    'location' => $location,
                ],
                'headers' => [
                    'Authorization' => 'Bearer c5a37997d0b2939f56e61fe68f65a652db87aa7f0db78995a954df2c5d5db851'
                ],
            ]
            );

            return $response->toArray();
    }
}