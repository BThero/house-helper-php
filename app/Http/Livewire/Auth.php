<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Auth extends Component
{
    public $selected = 'login';

    public function setSelected($value)
    {
        ray($value);
        $this->selected = $value;
    }

    public function render()
    {
        return view('livewire.auth');
    }
}
