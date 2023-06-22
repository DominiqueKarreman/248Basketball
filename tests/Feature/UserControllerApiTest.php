<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserControllerApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_it_can_create_a_user()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'geboorte_datum' => $this->faker->date(),
        ];

        $response = $this->postJson(route('api.register'), $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }

    public function test_it_can_update_a_user()
    {
        $user = User::factory()->create();


        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'geboorte_datum' => $this->faker->date(),

        ];

        $response = $this->actingAs($user)->putJson(route('api.users.update', $user->id), $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'email' => $data['email'],
            'geboorte_datum' => $data['geboorte_datum'],

        ]);
    }
}
