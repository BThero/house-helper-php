<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

class CitySearch extends Component
{
    public string $query;

    public $cities = [];

    public bool $enabled;

    public function disableSearch()
    {
        $this->enabled = false;
    }

    public function enableSearch()
    {
        $this->enabled = true;
    }

    public function mount()
    {
        $this->query = '';
        $this->cities = [];
        $this->enableSearch();
    }

    public function setQueryValueAndEnable($query)
    {
        $this->query = $query;
        $this->enableSearch();
    }

    public function setQueryValueAndDisable($query)
    {
        $this->query = $query;
        $this->disableSearch();
    }

    public function search()
    {
        $parsed = strtolower(trim($this->query));

        if (! $this->enabled || strlen($parsed) <= 3) {
            $this->cities = [];

            return;
        }

        $this->cities = City::whereRaw('LOWER(full_name) LIKE ? ', ['%'.$parsed.'%'])
            ->get();
    }

    public function render()
    {
        $this->search();

        return view('livewire.city-search');
    }
}
