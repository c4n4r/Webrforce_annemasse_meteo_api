<?php

namespace App\Model;

use App\Helpers\TemperaturesHelper;

class Weather
{
    private string $description;
    private string $icon;
    private float $temperature;
    private float $feelLike;
    private float|int $humidity;
    private float $pressure;
    private float $windSpeed;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Weather
     */
    public function setDescription(string $description): Weather
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return Weather
     */
    public function setIcon(string $icon): Weather
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @param float $temperature
     * @return Weather
     */
    public function setTemperature(float $temperature): Weather
    {
        $this->temperature = $temperature;
        return $this;
    }

    /**
     * @return float
     */
    public function getFeelLike(): float
    {
        return $this->feelLike;
    }

    /**
     * @param float $feelLike
     * @return Weather
     */
    public function setFeelLike(float $feelLike): Weather
    {
        $this->feelLike = $feelLike;
        return $this;
    }

    /**
     * @return float|int
     */
    public function getHumidity(): float|int
    {
        return $this->humidity;
    }

    /**
     * @param float|int $humidity
     * @return Weather
     */
    public function setHumidity(float|int $humidity): Weather
    {
        $this->humidity = $humidity;
        return $this;
    }

    /**
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }

    /**
     * @param float $pressure
     * @return Weather
     */
    public function setPressure(float $pressure): Weather
    {
        $this->pressure = $pressure;
        return $this;
    }

    /**
     * @return float
     */
    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }

    /**
     * @param float $windSpeed
     * @return Weather
     */
    public function setWindSpeed(float $windSpeed): Weather
    {
        $this->windSpeed = $windSpeed;
        return $this;
    }

    public function hydrateFromOpenWeather(array $data): Weather
    {
        $this->setDescription($data['weather'][0]['description'])
            ->setIcon($data['weather'][0]['icon'])
            ->setTemperature(TemperaturesHelper::kelvinToCelsius($data['main']['temp']))
            ->setFeelLike(TemperaturesHelper::kelvinToCelsius($data['main']['feels_like']))
            ->setHumidity($data['main']['humidity'])
            ->setPressure($data['main']['pressure'])
            ->setWindSpeed($data['wind']['speed']);
        return $this;
    }



}
