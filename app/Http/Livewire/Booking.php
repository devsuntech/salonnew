<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Booking extends Component
{
    public $sub_services;
    public function render()
    {
        return view('livewire.booking');
    }
}
