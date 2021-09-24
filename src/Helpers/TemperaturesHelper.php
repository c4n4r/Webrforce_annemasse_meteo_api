<?php

namespace App\Helpers;

class TemperaturesHelper
{

    public static function kelvinToCelsius(float $kelvins): float {
        return $kelvins -273.15;
    }

    public static function celsiusToKelvins(float $celsius): float {
        return $celsius + 273.15;
    }

}
