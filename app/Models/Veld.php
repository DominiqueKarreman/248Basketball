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
        'img_url'
    ];
    public function distance($lat1, $lon1, $lat2, $lon2)
    {
        $earth_radius = 6371000; // in meters
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earth_radius * $c;
        return $distance;
    }
    public function sortWithDistance($lat, $long)
    {
        $velden = Veld::all()->toArray();
        if (!$velden) return 404;
        // calculate distance for each Veld object
        $tempVeld = new Veld();
        $veldenWithDistance = [];
        foreach ($velden as $veld) {
            $distance = $tempVeld->distance($lat, $long, $veld['latitude'], $veld['longitude']);
            //     array_push($velden, $distance)
            // if($distance != 0)dd($distance);
            $veldWithDistance = [...$veld, "distance" => $distance];
            array_push($veldenWithDistance, $veldWithDistance);
        }

        // dd($veldenWithDistance);
        // sort the array by distance
        usort($veldenWithDistance, function ($a, $b) {
            if ($a['distance'] == $b['distance']) {
                return 0;
            }
            return ($a['distance'] < $b['distance']) ? -1 : 1;
        });

        // return the sorted array
        return $veldenWithDistance;
    }
}
