<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneContacts extends Model
{
    use HasFactory;

    protected $table = 'phone_contacts';
    protected $primaryKey = 'id';

    public function player()
    {
        return $this->belongsTo(Players::class, 'owner', 'identifier');
    }
}
