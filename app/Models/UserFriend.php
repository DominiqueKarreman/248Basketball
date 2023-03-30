<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFriend extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'friends_id',
        'is_mutual',
        'is_blocked',
        'request_accepted_at'
    ];
}