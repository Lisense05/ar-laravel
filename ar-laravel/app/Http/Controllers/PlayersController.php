<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlayersController extends Controller
{
    public function index()
    {
        $playercount = Cache::get('player_count');
        return view('panels.players', ['playercount' => $playercount]);
    }

}
