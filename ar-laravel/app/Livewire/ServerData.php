<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ServerData extends Component
{
    public $data;
    public $averagePing;

    protected $refreshInterval = 30; 
    public function render()
    {
        return view('livewire.server-data');
    }

    public function mount()
    {
        $this->data = Cache::get('server_data');
        $this->calculateAveragePing();
    }

    public function hydrate()
    {
        $this->data = Cache::get('server_data');
        $this->calculateAveragePing();
    }

    protected function calculateAveragePing()
    {
        if (!empty($this->data['players'])) {
            $totalPing = 0;
            $totalPlayers = count($this->data['players']);

            foreach ($this->data['players'] as $player) {
                $totalPing += $player['ping'];
            }

            $this->averagePing = $totalPing > 0 ? round($totalPing / $totalPlayers, 0) : 0;
        } else {
            $this->averagePing = 0;
        }
    }
}
