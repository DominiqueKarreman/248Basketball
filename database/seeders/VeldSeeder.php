<?php

namespace Database\Seeders;

use App\Models\Veld;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VeldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Veld::create(['latitude' => 52.350784, 'longitude' => 5.264702, 'naam' => 'Veld 1', 'adres' => 'Adres 1', 'postcode' => '1234 AB', 'plaats' => 'Plaats 1', 'capaciteit' => 10, 'aantal_baskets' => 2, 'verlichting' => true, 'competitie' => true, 'openingstijden' => '08:00:00', 'sluitingstijden' => '22:00:00', 'veld_leider' => 1, 'aantal_bezoekers' => 0, 'conditie' => 'Goed', 'img_url' => "storage/events/DSC02326.jpg"]);
    }
}
