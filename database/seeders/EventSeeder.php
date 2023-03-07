<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Event::create([
            'naam' => 'test',
            'datumTijd' => "2023-03-02 11:31:04",
            'locatie' => '248Kantoor',
            'beschrijving' => 'test',
            'img_url' => 'https://www.248basketball.nl/wp-content/uploads/2020/06/ARJO-1.png',
            'verantwoordelijke' => 1,
            'veld_id' => 1,
            'capaciteit' => 45,
            'duratie' => 180,
        ]);

    }
}