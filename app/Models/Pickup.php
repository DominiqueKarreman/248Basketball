<?php

namespace App\Models;

use App\Models\PickupPlayer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pickup extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
        'is_official',
        'is_private',
        'name',
        'veld',
        'max_players',
        'start_time',
        'end_time',
        'description',
        'date',
        'group',
        'creator'
    ];
    public function players()
    {
        return PickupPlayer::join('users', 'pickup_players.user', '=', 'users.id')
            ->select('pickup_players.*', 'users.name as player_name')
            ->where('pickup_players.pickup', $this->id)
            ->get();
    }
}
