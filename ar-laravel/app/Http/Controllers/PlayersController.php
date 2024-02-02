<?php

namespace App\Http\Controllers;

use App\Models\Players;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlayersController extends Controller
{
    public function index()
    {
        $startTime = microtime(true);
        $page = request()->get('page', 1);
        $cacheKey = 'players_page_' . $page;
        $fromCache = 'Cache';

        if (Cache::has($cacheKey)) {
            $players = Cache::get($cacheKey);
            error_log('From cache');
            $fromCache = 'Cache';

        } else {
            $players = Players::select(
                'identifier',
                'group',
                'accounts',
                'permission_level',
                'inventory',
                'job',
                'job_grade',
                'firstname',
                'lastname',
                'phone'
            )
                ->withCount('vehicles')
                ->paginate(10);
            
            Cache::put($cacheKey, $players, now()->addMinutes(10));
            error_log('From database');
            $fromCache = 'Database';
        }

        $executionTime = (microtime(true) - $startTime) * 1000;

        $executionTime =  number_format($executionTime, 2);

        return view('panels.players', compact('players', 'executionTime', 'fromCache'));
    }


    public function search(Request $request)
    {
        $startTime = microtime(true);
        $page = request()->get('page', 1);
        $cacheKey = 'players_page_' . $page;
        $fromCache = 'Database';

        $query = $request->input('query');

        $players = Players::where('identifier', 'like', "%$query%")
            ->orWhere('firstname', 'like', "%$query%")
            ->orWhere('lastname', 'like', "%$query%")
            ->orWhere('group', 'like', "%$query%")
            ->orWhere('accounts', 'like', "%$query%")
            ->orWhere('permission_level', 'like', "%$query%")
            ->orWhere('inventory', 'like', "%$query%")
            ->orWhere('job', 'like', "%$query%")
            ->orWhere('job_grade', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->withCount('vehicles')
            ->paginate(10);
            $executionTime = (microtime(true) - $startTime) * 1000;

            $executionTime =  number_format($executionTime, 2);
        return view('panels.players', compact('players', 'executionTime', 'fromCache'));
    }
}
