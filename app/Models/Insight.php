<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\CanalEnum;
use App\Enums\SentimentoEnum;
use App\Enums\RiscoEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insight extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'protocolo',
        'cliente',
        'canal',
        'sentimento',
        'risco',
        'problema',
        'status',
    ];

    protected $casts = [
        'canal' => CanalEnum::class,
        'sentimento' => SentimentoEnum::class,
        'risco' => RiscoEnum::class,
        'status' => StatusEnum::class,
    ];
}
