<?php

namespace App\Http\Livewire;

use App\Services\WeatherAPI;
use Livewire\Component;

class HouseHeader extends Component
{
    public $house;
    public $condition;
    public $temperature;
    public $is_preloaded;

    public function mount()
    {
        if ($this->is_preloaded) {
            return;
        }

        $city = $this->house->city;

        if ($city) {
            $api = new WeatherAPI();
            $response = $api->GetCityWeather($city->name);
            $this->condition = $response->current->condition->text;
            $this->temperature = $response->current->temp_c;
        }
    }

    public function render()
    {
        return view('livewire.house-header');
    }
}
