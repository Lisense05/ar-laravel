<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    use HasFactory;

    protected $table = 'b_lottery';
    protected $primaryKey = 'autoid';


    public function player()
    {
        return $this->belongsTo(Players::class, 'registerid', 'identifier');
    }
}
