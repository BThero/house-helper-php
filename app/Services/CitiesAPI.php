<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CitiesAPI
{
    private $api_url = 'https://countriesnow.space/api/v0.1/';

    public function GetAllCountriesAndCities()
    {
        $response = Http::get($this->api_url.'countries');

        return json_decode($response->body());
    }

    public function GetAllCitiesOfCountry(string $country)
    {
        $response = Http::post($this->api_url.'countries/cities', [
            'country' => $country,
        ]);

        return json_decode($response->body());
    }

    public function GetAllCountries()
    {
        $response = Http::get($this->api_url.'countries/iso');

        return json_decode($response->body());
    }
}
