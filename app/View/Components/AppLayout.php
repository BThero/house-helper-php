<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public string $title;

    public bool $usesLivewire;

    public function __construct(string $title = 'House Helper', bool $usesLivewire = false)
    {
        $this->title = $title;
        $this->usesLivewire = $usesLivewire;
    }

    public function render()
    {
        return view('layouts.app');
    }
}
