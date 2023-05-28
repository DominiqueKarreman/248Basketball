<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //get factory


        $user = User::create([
            'name' => 'Dominique Karreman',
            'email' => 'domikar2010@hotmail.com',
            'password' => Hash::make('12345678'),
            'geboorte_datum' => '2004-18-08',
            'phone_number' => '+3153872098'
        ]);
        $user->assignRole('admin');
        $user_standard = User::create([
            'name' => 'Marjon Phu',
            'email' => 'test@hotmail.com',
            'password' => Hash::make('12345678'),
            'geboorte_datum' => '1999-15-02',
            'phone_number' => '+31611056246'
        ]);
        $jorg = User::create([
            'name' => 'Jorg Janssens',
            'email' => 'jorgjanssens@outlook.com',
            'password' => Hash::make('12345678'),
            'geboorte_datum' => '1999-15-02',
            'phone_number' => '+31623335589'
        ]);
        $denzel = User::create([
            'name' => 'Denzel Vaneer',
            'email' => 'denzelvaneer@outlook.com',
            'password' => Hash::make('12345678'),
            'geboorte_datum' => '1999-15-02',
            'phone_number' => '+31630035212'
        ]);

        $carlito = User::create([
            'name' => 'Carlito Antonio',
            'email' => 'carlitoantonio@outlook.com',
            'password' => Hash::make('12345678'),
            'geboorte_datum' => '1999-15-02',
            'phone_number' => '+31630035212'
        ]);
        $mats = User::create([
            'name' => 'Mats Swiers',
            'email' => 'matsswiers@outlook.com',
            'password' => Hash::make('12345678'),
            'geboorte_datum' => '1999-15-02',
            'phone_number' => '+31637300779'
        ]);
        $user_standard->assignRole('user');
        $jorg->assignRole('admin');
        $denzel->assignRole('admin');
        $carlito->assignRole('Moderator');
        $mats->assignRole('Moderator');
    }
}
