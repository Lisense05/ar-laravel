<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Players extends Model
{
    protected $table = 'users';
    use HasFactory;

    protected $primaryKey = 'identifier';

    public $incrementing = false;
    
    protected $keyType = 'string';

    protected $fillable = [
        'identifier',
        'accounts',
        'group'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicles::class, 'owner', 'identifier');
    }

    public function bankTransactions()
    {
        return $this->hasMany(BankTransactions::class, 'sender_identifier', 'identifier')
            ->orWhere('receiver_identifier', $this->identifier);
                
    }

    public function transactionCountByType($type)
    {
        return $this->bankTransactions()->where('type', $type)->count();
    }

    public function contacts()
    {
        return $this->hasMany(PhoneContacts::class, 'owner', 'identifier');
    }

    public function phoneTransactions()
    {
        return $this->hasMany(PhoneTransactions::class, 'from', 'identifier')
            ->orWhere('to', $this->identifier);
    }

    public function lottery()
    {
        return $this->hasMany(Lottery::class, 'registerid', 'identifier');
    }
}
