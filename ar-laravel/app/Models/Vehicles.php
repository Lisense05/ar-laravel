<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $table = 'owned_vehicles';
    use HasFactory;

    protected $primaryKey = 'plate';

    public $incrementing = false;
    
    protected $keyType = 'string';
    use HasFactory;

    public function player()
    {
        return $this->belongsTo(Players::class, 'owner', 'identifier');
    }
}
