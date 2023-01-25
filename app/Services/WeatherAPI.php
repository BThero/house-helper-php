<?php

namespace App\Services;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class WeatherAPI
{
    private $api_url = 'https://api.weatherapi.com/v1/';

    public function GetCityWeather($city)
    {
        $response = Http::get($this->api_url.'current.json', [
            'key' => env('WEATHER_API_KEY'),
            'q' => $city,
        ]);

        return $response;
    }

    public function GetCitiesWeather($cities)
    {
        $responses = Http::pool(function (Pool $pool) use (&$cities) {
            return array_map(function ($city) use (&$pool) {
                return $pool->as($city->full_name)->get($this->api_url.'current.json', [
                    'key' => env('WEATHER_API_KEY'),
                    'q' => $city->name,
                ]);
            }, $cities);
        });

        $parsed = [];

        foreach ($cities as $city) {
            $response = $responses[$city->full_name];

            if ($response->ok()) {
                $parsed[$city->id] = json_decode($response->body());
            }
        }

        return $parsed;
    }
}
