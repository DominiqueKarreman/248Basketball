<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'image',
        'description',
        'email',
        'phone',
        'instagram',
        'facebook',
        'linkedin',
        'user_id',
    ];
}
