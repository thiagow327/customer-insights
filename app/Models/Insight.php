<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insight extends Model
{
    protected $fillable = [
        'cliente',
        'canal',
        'sentimento',
        'risco',
        'problema',
        'status',
    ];
}
