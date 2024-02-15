<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnedVehicles extends Model
{
    use HasFactory;
    protected $table = 'owned_vehicles';
    protected $primaryKey = 'owner';
}
