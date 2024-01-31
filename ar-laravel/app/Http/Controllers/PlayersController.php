<?php

namespace App\Http\Controllers;

use App\Models\Players;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Players::select('identifier', 'group', 'accounts', 'permission_level', 'inventory', 'job', 'job_grade', 'firstname', 'lastname' )->paginate(10);
        return view('panels.players', compact('players'));
    }
    

}
