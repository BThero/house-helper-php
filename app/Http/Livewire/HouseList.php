<?php

namespace App\Http\Livewire;

use App\Services\WeatherAPI;
use Livewire\Component;

class HouseList extends Component
{
    public $houses;
    public $responses;

    public function mount()
    {
        $cities = [];

        foreach ($this->houses as $house) {
            $city = $house->city;

            if ($city && !isset($cities[$city->id])) {
                $cities[$city->id] = $city;
            }
        }

        $cities = array_values($cities);
        $api = new WeatherAPI();
        $this->responses = $api->GetCitiesWeather($cities);
    }

    public function render()
    {
        return view('livewire.house-list');
    }
}
