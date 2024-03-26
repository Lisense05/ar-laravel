<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneTransactions extends Model
{
    use HasFactory;

    protected $table = 'phone_transactions';
    protected $primaryKey = 'id';

    public function scopeRelatedToPlayer($query, $playerId)
    {
        return $query->where('from', $playerId)
                    ->orWhere('to', $playerId); 
    }

}
