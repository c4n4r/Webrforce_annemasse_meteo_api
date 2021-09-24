<?php

namespace App\Services;

use App\Model\Weather;
use App\Services\Abstractions\HttpClientServiceInterface;

class WeatherManagementService
{
    private $clientService;
    private $apiKey;
    public function __construct(HttpClientServiceInterface $clientService, string $apiKey)
    {
        $this->clientService = $clientService;
        $this->apiKey = $apiKey;
    }

    public function getWeatherFromCity(string $city): Weather {
        $data = $this->clientService->sendGetRequest('https://api.openweathermap.org/data/2.5/weather',
            ['q' => $city, 'appId' => $this->apiKey], true);
        $model = new Weather();
        $model = $model->hydrateFromOpenWeather($data);
        return $model;
    }


}
