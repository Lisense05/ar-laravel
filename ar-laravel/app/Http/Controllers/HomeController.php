<?php

namespace App\Http\Controllers;

use App\Models\BankTransactions;
use App\Models\Banlist;
use App\Models\Jobs;
use App\Models\NewUsers;
use App\Models\OnlinePLayers;
use App\Models\OwnedVehicles;
use App\Models\PhoneTransactions;
use App\Models\Players;
use App\Models\ServerMoney;

class HomeController extends Controller
{
    public function index() 
    {
        //TODO: CACHE AND MORE stats for players count etc.
        $moneys = ServerMoney::orderBy('datename', 'DESC')->take(20)->get();
        $count = Players::count();
        $bans = Banlist::count();
        $vehicles = OwnedVehicles::count();
        $jobs = Jobs::count();
        $btransactions = BankTransactions::count();
        $ptranscations = PhoneTransactions::count();
        $transaction = $btransactions + $ptranscations;


        $maxPlayers = OnlinePLayers::orderBy('DATENAME', 'DESC')->take(10)->get();
        $maxPLayersData = [];
        
        foreach($maxPlayers as $player) {
            $maxPLayersData[$player->DATENAME] = $player->AMOUNT;
        }
        $values = array_values($maxPLayersData);
        $maxPlayers_util= 
        [
            'min' => min($values),
            'max' => max($values),
            'avg' => array_sum($values) / count($values)
        ];

        $newPlayers = NewUsers::orderBy('DATENAME', 'DESC')->take(10)->get();

        $newPlayersData = [];

        for ($i =1; $i <count($newPlayers); $i++) {
            $diff = $newPlayers[$i-1]->AMOUNT - $newPlayers[$i]->AMOUNT;
            $newPlayersData[$newPlayers[$i-1]->DATENAME] = $diff;
        }


        $dailyMoneyPure = [];
        $dailyBankPure = [];
        foreach ($moneys as $item) {
            if($item->TYPE == 'DAILYMONEY') {
                $dailyMoneyPure[$item->DATENAME] = $item->AMOUNT;
            } else {
                $dailyBankPure[$item->DATENAME] = $item->AMOUNT;

            }
            
        }
        
        ksort($dailyMoneyPure);
        ksort($dailyBankPure);
        ksort($maxPLayersData);
        ksort($newPlayersData);
        
        
        return view('panels.home', compact('dailyMoneyPure', 'dailyBankPure', 'count','bans','vehicles', 'jobs','transaction', 'maxPLayersData', 'maxPlayers_util', 'newPlayersData'));
    }
}
