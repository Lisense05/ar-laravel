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
}
