<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CitiesAPI
{
    private $api_url = 'https://countriesnow.space/api/v0.1/';

    public function AllCountriesAndCities()
    {
        $response = Http::get($this->api_url.'countries');

        return json_decode($response->body());
    }
}
