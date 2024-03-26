<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransactions extends Model
{
    use HasFactory;


    protected $table = 'okokBanking_transactions';
    protected $primaryKey = 'id';



    public function sender()
    {
        return $this->belongsTo(Players::class, 'sender_identifier', 'identifier');
    }

    public function receiver()
    {
        return $this->belongsTo(Players::class, 'receiver_identifier', 'identifier');
    }

    public function scopeRelatedToPlayer($query, $playerId, $queryTerm = null)
    {
        return $query->where(function ($query) use ($playerId) {
            $query->where('sender_identifier', $playerId)
                ->orWhere('receiver_identifier', $playerId);
        })->when($queryTerm, function ($query) use ($queryTerm) {
            $query->where(function ($query) use ($queryTerm) {
                $query->where('type', 'like', '%' . $queryTerm . '%')
                    ->orWhere('date', 'like', '%' . $queryTerm . '%')
                    ->orWhere('receiver_name', 'like', '%' . $queryTerm . '%')
                    ->orWhere('sender_name', 'like', '%' . $queryTerm . '%');
            });
        });
    }
}
