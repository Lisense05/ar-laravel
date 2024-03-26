<?php

namespace App\Livewire;

use Livewire\Component;

class VehicleList extends Component
{
    public $vehicles;
    public function render()
    {
        return view('livewire.vehicle-list');
    }

}
