<?php

namespace App\Http\Middleware;

use App\Models\Players;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class CachePlayerCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $playercount = Cache::remember('player_count', now()->addMinutes(60), function () {
            return Players::count();
        });
        $request->attributes->add(['player_count' => $playercount]);

        return $next($request);
    }
}
