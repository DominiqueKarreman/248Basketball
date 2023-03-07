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
       $user = User::create([
            'name' => 'Dominique Karreman',
            'email' => 'domikar2010@hotmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole('admin');
        $user_standard = User::create([
             'name' => 'Marjon Phu',
             'email' => 'test@hotmail.com',
             'password' => Hash::make('12345678'),
         ]);
        $user_standard->assignRole('user');
    }
}
