<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index() 
    {
        $playercount = Cache::get('player_count');
        return view('panels.home', ['playercount' => $playercount]);
    }
}
