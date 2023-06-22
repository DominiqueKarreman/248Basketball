<?php

use Tests\TestCase;
use App\Models\User;
use App\Models\Veld;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class VeldControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker, InteractsWithDatabase;

    public function testIndex()
    {
        // get 3 velden from database
        $velden = Veld::take(3)->get();
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $response = $this->actingAs($user)->get(route('velden.index'));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('velden.index');
        $response->assertViewHas('velden', $velden);
    }

    public function testCreate()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $response = $this->actingAs($user)->get(route('velden.create'));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('velden.create');
    }
    public function testCreateForbidden()
    {
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);
        $response = $this->actingAs($user)->get(route('velden.create'));
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);

        $data = [
            'naam' => $this->faker->name,
            'adres' => $this->faker->address,
            'postcode' => $this->faker->postcode,
            'plaats' => $this->faker->city,
            'capaciteit' => $this->faker->numberBetween(1, 100),
            'aantal_baskets' => $this->faker->numberBetween(1, 10),
            'verlichting' => $this->faker->boolean,
            'competitie' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
            'openingstijden' => $this->faker->time(),
            'sluitingstijden' => $this->faker->time(),
            'veld_leider' => null,
            'aantal_bezoekers' => $this->faker->numberBetween(1, 100),
            'conditie' => $this->faker->text,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'img_url' => 'null'
        ];

        $response = $this->actingAs($user)->post(route('velden.store'), $data);
        // $this->assertDatabaseHas('velden', $data);
        $response->assertRedirect(route('velden.index'));
    }

    public function testEdit()
    {

        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $veld = Veld::first();
        $response = $this->actingAs($user)->get(route('velden.edit', $veld->id));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('velden.edit');
    }
    public function testEditForbidden()
    {
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);
        $veld = Veld::first();
        $response = $this->actingAs($user)->get(route('velden.edit', $veld->id));
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function testUpdate()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);

        $veld = Veld::first();

        $data = [
            'naam' => $this->faker->name,
            'adres' => $this->faker->address,
            'postcode' => $this->faker->postcode,
            'plaats' => $this->faker->city,
            'capaciteit' => $this->faker->numberBetween(1, 100),
            'aantal_baskets' => $this->faker->numberBetween(1, 10),
            'verlichting' => $this->faker->boolean,
            'competitie' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
            'openingstijden' => $this->faker->time(),
            'sluitingstijden' => $this->faker->time(),
            'veld_leider' => null,
            'aantal_bezoekers' => $this->faker->numberBetween(1, 100),
            'conditie' => $this->faker->text,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
        ];

        $response = $this->actingAs($user)->put(route('velden.update', $veld), $data);
        $response->assertRedirect(route('velden.index'));
        $this->assertDatabaseHas('velden', $data);
    }
    public function testDestroy()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);

        $veld = Veld::factory()->create();

        $response = $this->actingAs($user)->delete(route('velden.destroy', $veld));
        $response->assertRedirect(route('velden.index'));
    }
    public function testDestroyWithUserRole()
    {
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);

        $veld = Veld::factory()->create();

        $response = $this->actingAs($user)->delete(route('velden.destroy', $veld));
        $response->assertForbidden();
    }
}
