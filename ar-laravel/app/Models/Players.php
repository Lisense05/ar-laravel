<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    
}
