<?php

namespace Database\Seeders;

use App\Models\City;
use App\Services\CitiesAPI;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        $api = new CitiesAPI;
        $res = $api->GetAllCountriesAndCities();
        $allCities = [];

        if ($res->error === false) {
            foreach ($res->data as $item) {
                $country = $item->country;

                foreach ($item->cities as $city) {
                    $allCities[] = [
                        'country' => $country,
                        'name' => $city,
                        'full_name' => $country.', '.$city,
                    ];

                    if (count($allCities) === 100) {
                        City::insertOrIgnore($allCities);
                        $allCities = [];
                    }
                }
            }
        }

        City::insertOrIgnore($allCities);
    }
}
