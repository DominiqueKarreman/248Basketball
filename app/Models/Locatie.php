<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locatie extends Model
{
    use HasFactory;
    protected $table = 'locaties';
    protected $fillable = [
        'longitude',
        'latitude',
        'naam',
        'adres',
        'postcode',
        'plaats',
        'veld_id',
    ];
    public function veld($veld_id) 
    {
        return Veld::find($veld_id);
    }
}
