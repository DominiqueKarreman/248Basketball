<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veld extends Model
{
    use HasFactory;
    protected $table = 'velden';
   protected $fillable = [
        'longitude',
        'latitude',
        'naam',
        'adres',
        'postcode',
        'plaats',
        'capaciteit',
        'aantal_baskets',
        'verlichting',
        'competitie',
        'openingstijden',
        'sluitingstijden',
        'veld_leider',
        'aantal_bezoekers',
        'conditie',
   ];
}
