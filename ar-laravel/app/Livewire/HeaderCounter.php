<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class HeaderCounter extends Component
{
    public $data;

    protected $refreshInterval = 30; 
    
    public function render()
    {
        return view('livewire.header-counter');
    }

    public function mount()
    {
        $this->data = Cache::get('server_data');
        
    }

    public function hydrate()
    {
        $this->data = Cache::get('server_data');
        
    }
}
