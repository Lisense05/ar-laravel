<?php

namespace App\Http\Controllers;

use App\Jobs\PreLoadCache;
use App\Models\BankTransactions;
use App\Models\PhoneTransactions;
use App\Models\Players;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Number;


class PlayersController extends Controller
{
    public function index()
    {
        $startTime = microtime(true);
        $page = request()->get('page', 1);
        error_log('Page: '.$page);
        $cacheKey = 'players_page_' . $page;
        $fromCache = 'Database';

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
            
        }

        $this->cacheCreate($players);

        $executionTime = number_format((microtime(true) - $startTime) * 1000, 2);
        return view('panels.players', compact('players', 'executionTime', 'fromCache'));
    }


    public function update(Request $request, $playerId)
    {
        $player = Players::findOrFail($playerId);

        if($request->phone !== $player->phone) {
            $phoneValidation = [
                'required',
                'string',
                'regex:/^\d{3}-\d{4}$/',
                'unique:'.Players::class
            ];
        } else {
            $phoneValidation = [
                'required',
                'string',
                'regex:/^\d{3}-\d{4}$/',
            ];
        }

        $request->validate([
            
            'permission' => ['required', 'integer', 'between:0,13'],
            'group' => ['required', 'string', 'in:user,admin,superadmin'],
            'phone' => $phoneValidation,
            'job_grade' => ['required', 'integer', 'digits_between:1,2'],
            'inventory' => ['required','json'],
            'account' => ['required', 'json'],
            'skin' => ['required', 'json'],
            'position' => ['required', 'json'],
            
        ]);



        $player->group = $request->group;
        $player->permission_level = $request->permission;
        $player->job = $request->input('job');
        $player->job_grade = $request->job_grade;
        $player->phone = $request->phone;
        $player->position = $request->position;
        $player->skin = $request->skin;
        $player->firstname = $request->input('firstname');
        $player->lastname = $request->input('lastname');
        $player->inventory = $request->inventory;
        $player->accounts = $request->account;

        $player->save();

        Cache::forget('player_info_' . $playerId);

        return redirect()->back()->with('success', 'Player updated successfully');

    }

    public function search(Request $request)
    {
/*         if(Cache::has('players_cache')) {
            error_log('VAN CACHE');
        } else {
            error_log('NINCS CACHE');
        } */

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
        $startTime = microtime(true);
        $cacheKey = 'player_info_' . $playerId;
        $cache = 'DB';
        if(Cache::has($cacheKey)) {
            $cachedData = Cache::get($cacheKey);
            $cache = 'CACHE';
        } else {

            $player = Players::find($playerId);
            $cachedData = $this->playerInfoCache($player, $cacheKey);
        }
        $cachedData = $this->paginateCreate($cachedData);
        $this->cacheCreate(collect([$cachedData['player']]));
        
        error_log('Main load '.$cache.' '.number_format((microtime(true) - $startTime) * 1000, 2) . 'ms');
        return view('panels.players-moreinfo', $cachedData);

    }




    public function searchPlayerBankTransactions(Request $request, $playerId)
    {
        $startTime = microtime(true);
        $cacheKey = 'player_info_' . $playerId;
        $query = $request->input('bq');
        $test = 'DB';

        if(Cache::has($cacheKey)) {
            $test='CACHE';
            $cachedData = Cache::get($cacheKey);

        } else { 
            $player = Players::find($playerId);
            $cachedData = $this->playerInfoCache($player, $cacheKey);
        }
        
        if($query !== null) { 
            $banktransactions = $cachedData['banktransactions'];
            if($banktransactions->isNotEmpty()) {
                $banktransactions = $banktransactions->toQuery()->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('receiver_name', 'like', '%' . $query . '%')
                        ->orWhere('sender_name', 'like', '%' . $query . '%')
                        ->orWhere('type', 'like', '%' . $query . '%')
                        ->orWhere('date', 'like', '%' . $query . '%');
                });
                $toCache = $banktransactions->paginate(5, ['*'], 'banktransactions')
                ->appends(request()->except('banktransactions'));
                

                $cachedData = $this->paginateCreate($cachedData);
                $cachedData['banktransactions'] = $toCache;
            } else {
                $cachedData = $this->paginateCreate($cachedData);
            }
        } else {
            $cachedData = $this->paginateCreate($cachedData);
        }
                
        $this->cacheCreate(collect([$cachedData['player']]));
        error_log($test.' '.number_format((microtime(true) - $startTime) * 1000, 2) . 'ms');
        return view('panels.players-moreinfo', $cachedData);
    }


    public function searchPlayerPhoneTransactions(Request $request, $playerId)
    {
        $startTime = microtime(true);
        $cacheKey = 'player_info_' . $playerId;
        $query = $request->input('pq');
        $test = 'DB';

        if(Cache::has($cacheKey)) {
            $test='CACHE';
            $cachedData = Cache::get($cacheKey);

        } else { 
            $player = Players::find($playerId);
            $cachedData = $this->playerInfoCache($player, $cacheKey);
        }

        if($query !== null) { 
            $phonetransactions = $cachedData['phonetransactions'];
            if($phonetransactions->isNotEmpty()) {
                $toCache = $phonetransactions->toQuery()->where('time', 'like', '%' . $query . '%')->paginate(5, ['*'], 'phonetransactions')->appends(request()->except('phonetransactions'));
                $cachedData = $this->paginateCreate($cachedData);
                $cachedData['phonetransactions'] = $toCache;
            } else {
                $cachedData = $this->paginateCreate($cachedData);
            }
        } else {
            $cachedData = $this->paginateCreate($cachedData);
        }

        $this->cacheCreate(collect([$cachedData['player']]));
        error_log($test.' ' . number_format((microtime(true) - $startTime) * 1000, 2) . 'ms');
        return view('panels.players-moreinfo', $cachedData);
    }
    

    public function searchPlayerContacts(Request $request, $playerId)
    {

        $startTime = microtime(true);
        $cacheKey = 'player_info_' . $playerId;
        $query = $request->input('cq');
        $test = 'DB';

        if(Cache::has($cacheKey)) {
            $test='CACHE';
            $cachedData = Cache::get($cacheKey);

        } else { 
            $player = Players::find($playerId);
            $cachedData = $this->playerInfoCache($player, $cacheKey);
            $cachedData = $this->paginateCreate($cachedData);
            
        }

        if($query !== null) {

            $contacts = $cachedData['contacts'];
            if($contacts->isNotEmpty()) {
                $contacts = $contacts->toQuery()->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('number', 'like', '%' . $query . '%')
                        ->orWhere('name', 'like', '%' . $query . '%');
                });
            
                $toCache = $contacts->paginate(5, ['*'], 'contacts')
                ->appends(request()->except('contacts'));
                
                $cachedData = $this->paginateCreate($cachedData);
                $cachedData['contacts'] = $toCache;
            
                
            } else {
                $cachedData = $this->paginateCreate($cachedData);
            }
        } else {
            $cachedData = $this->paginateCreate($cachedData);
        }

        $this->cacheCreate(collect([$cachedData['player']]));
        error_log($test.' '.number_format((microtime(true) - $startTime) * 1000, 2) . 'ms');
        return view('panels.players-moreinfo', $cachedData);
    }


    public function searchPlayerVehicles(Request $request, $playerId)
    {
        $startTime = microtime(true);
        $cacheKey = 'player_info_' . $playerId;
        $query = $request->input('vq');
        $test = 'DB';

        if(Cache::has($cacheKey)) {
            $test='CACHE';
            $cachedData = Cache::get($cacheKey);
        } else { 
            $player = Players::find($playerId);
            $cachedData = $this->playerInfoCache($player, $cacheKey);
            $cachedData = $this->paginateCreate($cachedData);
            
        }
        if($query !== null) {
            $vehicles = $cachedData['vehicles'];
            if($vehicles->isNotEmpty()) {
                $toCache= $vehicles->toQuery()->where('plate', 'like', '%'.$query.'%')->paginate(5, ['*'], 'vehicles')->appends(request()->except('vehicles'));
                $cachedData = $this->paginateCreate($cachedData);
                $cachedData['vehicles'] = $toCache;
            } else {
                $cachedData = $this->paginateCreate($cachedData);
            }
        } else {
            $cachedData = $this->paginateCreate($cachedData);
        }


        $this->cacheCreate(collect([$cachedData['player']]));
        error_log($test.' '.number_format((microtime(true) - $startTime) * 1000, 2) . 'ms');
        return view('panels.players-moreinfo', $cachedData);
    }

    private function paginateCreate($cachedData) 
    {
        $vehiclepage = request()->input('vehicles', 1);
        $contactspage = request()->input('contacts', 1);
        $banktransactionspage = request()->input('banktransactions', 1);
        $phonetransactionspage = request()->input('phonetransactions', 1);


        $perPage = 5;

        $vehicles = $cachedData['vehicles']->slice(($vehiclepage - 1) * $perPage, $perPage);
        $vehiclesPaginator = new LengthAwarePaginator(
            $vehicles,
            $cachedData['vehicles']->count(),
            $perPage,
            $vehiclepage,
            [
                'path' => request()->url(),
                'query' => request()->except('vehicles') 
            ]
        );
        $vehiclesPaginator->appends(request()->except('vehicles'))->setPageName('vehicles');

        $contacts = $cachedData['contacts']->slice(($contactspage - 1) * $perPage, $perPage);
        $contactsPaginator = new LengthAwarePaginator(
            $contacts,
            $cachedData['contacts']->count(),
            $perPage,
            $contactspage,
            [
                'path' => request()->url(),
                'query' => request()->except('contacts') 
            ]
        );
        $contactsPaginator->appends(request()->except('contacts'))->setPageName('contacts');

        $banktransactions = $cachedData['banktransactions']->slice(($banktransactionspage - 1) * $perPage, $perPage);
        $banktransactionsPaginator = new LengthAwarePaginator(
            $banktransactions,
            $cachedData['banktransactions']->count(),
            $perPage,
            $banktransactionspage,
            [
                'path' => request()->url(),
                'query' => request()->except('banktransactions') 
            ]
        );
        $banktransactionsPaginator->appends(request()->except('banktransactions'))->setPageName('banktransactions');


        $phonetransactions = $cachedData['phonetransactions']->slice(($phonetransactionspage - 1) * $perPage, $perPage);
        $phonetransactionsPaginator = new LengthAwarePaginator(
            $phonetransactions,
            $cachedData['phonetransactions']->count(),
            $perPage,
            $phonetransactionspage,
            
            [
                'path' => request()->url(),
                'query' => request()->except('banktransactions') 
            ]
        );
        $phonetransactionsPaginator->appends(request()->except('phonetransactions'))->setPageName('phonetransactions');

        $cachedData['banktransactions'] = $banktransactionsPaginator;
        $cachedData['phonetransactions'] = $phonetransactionsPaginator;
        $cachedData['contacts'] = $contactsPaginator;
        $cachedData['vehicles'] = $vehiclesPaginator;

        return $cachedData;
    }

    private function playerInfoCache($player, $cacheKey) {
        $vehicles = $player->vehicles()->get();
        $phonetransactions = $player->phoneTransactions()->get();
        $contacts = $player->contacts()->get();
        $banktransactions = $player->bankTransactions()->get();
        $cachedData = compact('player', 'vehicles', 'phonetransactions', 'contacts', 'banktransactions');
        Cache::put($cacheKey ,$cachedData, now()->addMinutes(10));
        return $cachedData;
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
