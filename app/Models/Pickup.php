<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    protected $fillable =[
        'is_active',
        'is_official',
        'name',
        'veld',
        'max_players',
        'start_time',
        'end_time',
        'description',
        'group',
        'creator'
    ]; 
}
