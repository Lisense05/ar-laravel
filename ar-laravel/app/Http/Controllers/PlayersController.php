<?php

namespace App\Http\Controllers;

use App\Models\PhoneTransactions;
use App\Models\Players;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Number;


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
                'phone',
                'position',
                'skin'
            )
                ->with('vehicles')
                ->with('contacts')
                ->with('lottery')
                ->paginate(10);
            
            $players->transform(function ($player){
                $player->accounts = json_decode($player->accounts, true);
                return $player;
            });

            Cache::put($cacheKey, $players, now()->addMinutes(10));
            error_log('From database');
            $fromCache = 'Database';
        }

        $this->cacheCreate($players);

        $executionTime = number_format((microtime(true) - $startTime) * 1000, 2);
        return view('panels.players', compact('players', 'executionTime', 'fromCache'));
    }


    public function search(Request $request)
    {
        //TODO: Add cache for overall search asnyc query for ALl Players
        $startTime = microtime(true);
        $page = request()->get('page', 1);
        $cacheKey = 'players_page_' . $page;
        $fromCache = 'Database';

        $query = $request->input('query');

        $players = Players::where('identifier', 'like', "%$query%")
            ->orWhere('firstname', 'like', "%$query%")
            ->orWhere('lastname', 'like', "%$query%")
            ->orWhere('group', 'like', "%$query%")
            ->orWhere('permission_level', 'like', "%$query%")
            ->orWhere('inventory', 'like', "%$query%")
            ->orWhere('job', 'like', "%$query%")
            ->orWhere('job_grade', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->with('vehicles')
            ->with('contacts')
            
            ->paginate(10);
            $players->transform(function ($player){
                $player->accounts = json_decode($player->accounts, true);
                return $player;
            });
            
        $this->cacheCreate($players);
        $executionTime = number_format((microtime(true) - $startTime) * 1000, 2);
        return view('panels.players', compact('players', 'executionTime', 'fromCache'));
    }

    public function getPlayerInfo($playerId)
    {
        //TODO: Add cache for player info
        $player = Players::find($playerId);
        $vehicles = $player->vehicles()->paginate(5, ['*'], 'vehicles')->appends(request()->except('vehicles'));
        $phonetransactions = $player->phoneTransactions()->paginate(5, ['*'], 'phonetransactions')->appends(request()->except('phonetransactions'));
        $contacts = $player->contacts()->paginate(5, ['*'], 'contacts')->appends(request()->except('contacts'));
        $banktransactions = $player->bankTransactions()->paginate(5, ['*'], 'banktransactions')->appends(request()->except('banktransactions'));
        $this->cacheCreate(collect([$player]));
        error_log('LOADING');
        return view('panels.players-moreinfo', compact('player', 'vehicles', 'phonetransactions', 'contacts', 'banktransactions'));

    }


    public function searchPlayerBankTransactions(Request $request, $playerId)
    {
        $player = Players::find($playerId);
        $query = $request->input('bq');
        $banktransactions = $player->bankTransactions()
            ->where('type', 'like', '%'.$query.'%')
            ->orWhere('date', 'like', '%'.$query.'%')
            ->orWhere('receiver_identifier', 'like', '%'.$query.'%')
            ->orWhere('sender_identifier', 'like', '%'.$query.'%')
            ->paginate(5, ['*'], 'banktransactions')->appends(request()->except('banktransactions'));
        $phonetransactions = $player->phoneTransactions()->paginate(5, ['*'], 'phonetransactions')->appends(request()->except('phonetransactions'));
        $contacts = $player->contacts()->paginate(5, ['*'], 'contacts')->appends(request()->except('contacts'));
        $vehicles = $player->vehicles()->paginate(5, ['*'], 'vehicles')->appends(request()->except('vehicles'));
        $this->cacheCreate(collect([$player]));
        error_log('LOADING Search');
        return view('panels.players-moreinfo', compact('player', 'vehicles', 'phonetransactions', 'contacts', 'banktransactions'));
    }

    public function searchPlayerPhoneTransactions(Request $request, $playerId)
    {
        $player = Players::find($playerId);
        $query = $request->input('pq');
        $phonetransactions = $player->phonetransactions()
            ->where('from', 'like', '%'.$query.'%')
            ->orWhere('to', 'like', '%'.$query.'%')
            ->orWhere('time', 'like', '%'.$query.'%')
            ->paginate(5, ['*'], 'contacts')->appends(request()->except('phonetransactions'));
        $contacts = $player->contacts()->paginate(5, ['*'], 'contacts')->appends(request()->except('contacts'));
        $vehicles = $player->vehicles()->paginate(5, ['*'], 'vehicles')->appends(request()->except('vehicles'));
        $banktransactions = $player->bankTransactions()->paginate(5, ['*'], 'banktransactions')->appends(request()->except('banktransactions'));
        $this->cacheCreate(collect([$player]));
        error_log('LOADING Search');
        return view('panels.players-moreinfo', compact('player', 'vehicles', 'phonetransactions', 'contacts', 'banktransactions'));
    }

    public function searchPlayerContacts(Request $request, $playerId)
    {

        $player = Players::find($playerId);
        $query = $request->input('cq');
        $contacts = $player->contacts()
            ->where('number', 'like', '%'.$query.'%')
            ->orWhere('name', 'like', '%'.$query.'%')
            ->paginate(5, ['*'], 'contacts')->appends(request()->except('contacts'));
        $phonetransactions = $player->phoneTransactions()->paginate(5, ['*'], 'phonetransactions')->appends(request()->except('phonetransactions'));
        $vehicles = $player->vehicles()->paginate(5, ['*'], 'vehicles')->appends(request()->except('vehicles'));
        $banktransactions = $player->bankTransactions()->paginate(5, ['*'], 'banktransactions')->appends(request()->except('banktransactions'));
        $this->cacheCreate(collect([$player]));
        error_log('LOADING Search');
        return view('panels.players-moreinfo', compact('player', 'vehicles', 'phonetransactions', 'contacts', 'banktransactions'));
    }


    public function searchPlayerVehicles(Request $request, $playerId)
    {
        //TODO: Use player info cache
        $player = Players::find($playerId);
        $query = $request->input('vq');
        $vehicles = $player->vehicles()
            ->where('plate', 'like', '%'.$query.'%')
            ->paginate(5, ['*'], 'vehicles')->appends(request()->except('vehicles'));
            $phonetransactions = $player->phoneTransactions()->paginate(5, ['*'], 'phonetransactions')->appends(request()->except('phonetransactions'));
        $contacts = $player->contacts()->paginate(5, ['*'], 'contacts')->appends(request()->except('contacts'));
        $banktransactions = $player->bankTransactions()->paginate(5, ['*'], 'banktransactions')->appends(request()->except('banktransactions'));
        $this->cacheCreate(collect([$player]));
        error_log('LOADING Search');
        return view('panels.players-moreinfo', compact('player', 'vehicles', 'phonetransactions', 'contacts', 'banktransactions'));
    }





    private function cacheCreate($players) {
        $players->each(function ($player) {
            $transactionCountKey = 'transaction_counts_' . $player->identifier;
            $phoneTransaction = 'phone_transaction_' . $player->identifier;
            if(!Cache::has($transactionCountKey)) {
                $depositCount = $player->transactionCountByType('deposit');
                $withdrawalCount = $player->transactionCountByType('withdraw');
                $transferCount = $player->transactionCountByType('transfer');

                $transactionCounts = [
                    'deposit' => $depositCount,
                    'withdraw' => $withdrawalCount,
                    'transfer' => $transferCount
                ];

                Cache::put($transactionCountKey, $transactionCounts, now()->addMinutes(10));
            } 
            if(!Cache::has($phoneTransaction)) {
                $fromTransactions = PhoneTransactions::where('from', $player->identifier)->get();
                $toTransactions = PhoneTransactions::where('to', $player->identifier)->get();

                $fromAmountSum = Number::currency($fromTransactions->sum('amount'), 'USD');
                $toAmountSum = Number::currency($toTransactions->sum('amount'), 'USD');

                $phoneTransactionCounts = [
                    'from' => [
                        'count' => $fromTransactions->count(),
                        'amount_sum' => $fromAmountSum,
                    ],
                    'to' => [
                        'count' => $toTransactions->count(),
                        'amount_sum' => $toAmountSum,
                    ]
                ];
                Cache::put($phoneTransaction, $phoneTransactionCounts, now()->addMinutes(10));
            }
        });
    }
}
