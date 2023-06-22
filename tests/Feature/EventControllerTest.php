<?php

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $response = $this->actingAs($user)->get(route('events.index'));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('events.index');
        $response->assertViewHas('events');
    }

    public function testCreateAdmin()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $response = $this->actingAs($user)->get(route('events.create'));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('events.create');
        $response->assertViewHas('users');
        $response->assertViewHas('velden');
        $response->assertViewHas('locaties');
    }
    public function testCreateUser()
    {
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);
        $response = $this->actingAs($user)->get(route('events.create'));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('events.create');
        $response->assertViewHas('users');
        $response->assertViewHas('velden');
        $response->assertViewHas('locaties');
    }
    public function testStoreUnauthorized()
    {
        $user = User::factory()->create();
        $data = [
            'naam' => 'Test Event',
            'verantwoordelijke' => $user->id,
            'start_tijd' => now(),
            'capaciteit' => 100,
            'eind_tijd' => now()->addHours(2),
            'beschrijving' => 'This is a test event',
            'prijs' => 10.0,
            'locatie_id' => 1,
            'locatie_naam' => 'Test Locatie',
            'veld_id' => 1,
        ];

        $response = $this->actingAs($user)->post(route('events.store'), $data);
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
    public function testStore()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $data = [
            'naam' => 'Test Event',
            'verantwoordelijke' => $user->id,
            'start_tijd' => now(),
            'capaciteit' => 100,
            'eind_tijd' => now()->addHours(2),
            'beschrijving' => 'This is a test event',
            'prijs' => 10.0,
            'locatie_id' => 1,
            'locatie_naam' => 'Test Locatie',
            'veld_id' => 1,
        ];

        // Check if the locatie_id exists in the locaties table
        if (!DB::table('locaties')->where('id', $data['locatie_id'])->exists()) {
            //create the location
            DB::table('locaties')->insert([
                'id' => $data['locatie_id'],
                'naam' => $data['locatie_naam'],
            ]);
        }

        $response = $this->actingAs($user)->post(route('events.store'), $data);
        $response->assertRedirect(route('events.index'));
        $this->assertDatabaseHas('events', [
            'naam' => 'Test Event',
            'verantwoordelijke' => $user->id,
            'capaciteit' => 100,
            'beschrijving' => 'This is a test event',
            'prijs' => 10.0,
            'locatie_id' => 1,
            'veld_id' => 1,
        ]);
        $response = $this->actingAs($user)->post(route('events.store'), $data);
        $response->assertRedirect(route('events.index'));
        $this->assertDatabaseHas('events', [
            'naam' => 'Test Event',
            'verantwoordelijke' => $user->id,
            'capaciteit' => 100,
            'beschrijving' => 'This is a test event',
            'prijs' => 10.0,
            'locatie_id' => 1,
            'veld_id' => 1,
        ]);
    }

    public function testShow()
    {
        $user = User::factory()->create();
        $event = Event::first();
        $response = $this->actingAs($user)->get(route('events.show', $event));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('events.show');
        $response->assertViewHas('event', $event);
    }
}
