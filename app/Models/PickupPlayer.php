<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupPlayer extends Model
{
    use HasFactory;
    protected $fillable = [
        'group',
        'user',
        'accepted',
        'current_wins',
        'current_losses',
        'current_misses',
        'current_makes',
        'current_points',
        'current_games_played',
        'pickup'
    ];
}
