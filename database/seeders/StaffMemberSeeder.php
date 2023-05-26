<?php

namespace Database\Seeders;

use App\Models\StaffMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //generate 4 staffmembers
        StaffMember::create([
            "name" => "Jorg Janssens",
            "role" => "Co-founder / Skills trainer",
            "image" => "storage/staff/jorg.png",
            "video" => "storage/staff/jorg.mp4",
            "description" => 'Al vanaf mijn 7e ben ik te vinden op het basketbalveld. Vanaf het eerste moment ben ik verliefd op de sport. Het basketbalveld is de plek waar ik ben opgegroeid, vele lessen heb geleerd en waar ik mij altijd thuis voel. Ik probeer altijd het maximale uit mijzelf en anderen te halen. Na vele jaren op hoog niveau meegedraaid te hebben, wil ik nu mijn aandacht besteden aan anderen. Ik houd ervan om anderen te helpen met het ontwikkelen van hun game.
        “Basketball is not just a sport, Its a lifestyle.”',
            "email" => "jorgjanssens@outlook.com",
            "phone" => "+31 6 23 33 55 89",
            "instagram" => "https://www.instagram.com/jorgjanssens/",
            "linkedin" => "https://www.linkedin.com/in/jorg-janssens-002441119/?originalSubdomain=nl",
            "facebook" => "https://www.facebook.com/jorg.janssens.3",
            "user_id" => 3
        ]);

    }
}