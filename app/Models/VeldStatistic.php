<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeldStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'veld',
        'wins',
        'losses',
        'misses',
        'makes',
        'points',
        'games_played',
        'user',
    ];
}
