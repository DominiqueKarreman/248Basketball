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
            "name" => "Denzel Vaneer",
            "role" => "Co-founder / Skills trainer",
            "image" => "storage/staff/denzel.png",
            "video" => "storage/staff/denzel.mp4",
            "description" => 'Voor langer dan 10 jaar ben ik actief als basketbalspeler en ik ben daarnaast al een paar jaren coach/trainer. Voor mij is basketbal een sport waarbij ik veel word uitgedaagd “on the court”, maar daarnaast lessen kan meenemen voor “off the court”. Deze samenhang zorgt ervoor dat basketbal een belangrijk deel in mijn leven is en ik dit graag met een ieder wil delen. Het heeft mij bijvoorbeeld geleerd dat je moet doen waar je passie ligt en daar elke dag hard voor willen werken. Vanuit daar kan je, naar mijn mening, elke dag met een glimlach opstaan en elkaar helpen het beste uit elkaar te halen, net als je team genoten “on the court”!',
            "email" => "denzelvaneer@outlook.com",
            "phone" => "+31630035212",
            "instagram" => "https://www.instagram.com/denzel_vaneer/",
            "linkedin" => "https://www.linkedin.com/in/denzel-vaneer-0251911bb/",
            "facebook" => "https://www.facebook.com/denzel.vaneer",
            "user_id" => 4
        ]);
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
        StaffMember::create([
            "name" => "Carlito Antonio",
            "role" => "Strength & conditioning trainer",
            "image" => "storage/staff/carlito.png",
            "video" => "storage/staff/carlito.mp4",
            "description" => 'Sinds mijn veertiende is mijn passie voor basketbal ontstaan. Ik begon buiten op een pleintje en heb uiteindelijk op hoog niveau gebasketbald in mijn jeugd. Daarnaast ben ik begin 2022 afgestudeerd als fysiotherapeut. Met mijn passie en expertise hoop ik andere basketballers te helpen in hun ontwikkeling.',
            "email" => "carlitoantonio@outlook.com",
            "phone" => "+31 6 23 33 55 89",
            "instagram" => "https://www.instagram.com/the.lito/",
            "linkedin" => "",
            "facebook" => "",
            "user_id" => 5
        ]);
        StaffMember::create([
            "name" => "Mats Swiers",
            "role" => "Breedtesport coördinator",
            "image" => "storage/staff/mats.png",
            "video" => "storage/staff/mats.mp4",
            "description" => 'Ik heb basketbal een paar jaar geleden ontdekt en ben sindsdien verslaafd aan de sport. Ik wil mezelf en anderen beter blijven maken. Momenteel zit ik op het mbo waar ik sport en bewegen studeer. Bij 24/8 werk ik vooral in de breedtesport dus je komt mij vooral tegen bij de clinics en pickups
            ',
            "email" => "matsswiers@outlook.com",
            "phone" => "+31637300779",
            "instagram" => "https://www.instagram.com/mats_swiers/",
            "linkedin" => "",
            "facebook" => "",
            "user_id" => 6
        ]);
    }
}
