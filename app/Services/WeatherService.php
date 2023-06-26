<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $key;

    public function __construct()
    {
        $this->key = config('services.weatherapi.key');
    }

    public function getCurrentWeather($city)
    {
        return Cache::remember("weather.{$city}", 1800, function () use ($city) {
            $response = Http::get("http://api.weatherapi.com/v1/current.json?key={$this->key}&q={$city}");

            return $response->json();
        });
    }
}

