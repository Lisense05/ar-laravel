<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePLayers extends Model
{
    use HasFactory;
    protected $table = 'ADMIN_ONLINE';
    protected $primaryKey = 'ID';
}
