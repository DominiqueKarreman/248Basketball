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
            'img_url' => 'storage/events/DSC01039-min.jpg',
            'verantwoordelijke' => 1,
            'veld_id' => 1,
            'capaciteit' => 45,
            'duratie' => 180,
        ]);
    }
}
