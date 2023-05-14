<?php

namespace Tests\Unit\Http\Controllers\Api;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiEventControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_returns_all_events()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $events = Event::factory()->count(3)->create();

        $response = $this->getJson('/api/events');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
        $response->assertJsonFragment([
            'id' => $events[0]->id,
            'name' => $events[0]->name,
            'description' => $events[0]->description,
            'latitude' => $events[0]->getLatLong()['latitude'],
            'longitude' => $events[0]->getLatLong()['longitude'],
            'img_url' => "http://116.203.134.102/" . $events[0]->img_url,
        ]);
    }

    /** @test */
    public function index_returns_403_if_user_does_not_have_permission()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->getJson('/api/events');

        $response->assertStatus(403);
        $response->assertJsonFragment([
            'message' => 'You are not authorized to view events',
        ]);
    }

    /** @test */
    public function store_creates_new_event()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $eventData = Event::factory()->make()->toArray();

        $response = $this->postJson('/api/events', $eventData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('events', $eventData);
    }

    /** @test */
    public function store_returns_existing_event_if_already_stored()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $event = Event::factory()->create();

        $response = $this->postJson('/api/events', $event->toArray());

        $response->assertStatus(400);
        $response->assertJsonFragment([
            'message' => 'Event was already stored in the database',
        ]);
    }

    /** @test */
    public function store_returns_403_if_user_does_not_have_permission()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $eventData = Event::factory()->make()->toArray();

        $response = $this->postJson('/api/events', $eventData);

        $response->assertStatus(403);
        $response->assertJsonFragment([
            'message' => 'You are not authorized to create events',
        ]);
    }

    /** @test */
    public function show_returns_event_by_id()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $event = Event::factory()->create();

        $response = $this->getJson("/api/events/{$event->id}");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'id' => $event->id,
            'name' => $event->name,
            'description' => $event->description,
            'latitude' => $event->getLatLong()['latitude'],
            'longitude' => $event->getLatLong()['longitude'],
        ]);
    }

    /** @test */
    public function show_returns_404_if_event_not_found()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->getJson('/api/events/999');

        $response->assertStatus(404);
        $response->assertJsonFragment([
            'message' => 'Event not found',
        ]);
    }

    /** @test */
    public function show_returns_403_if_user_does_not_have_permission()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $event = Event::factory()->create();

        $response = $this->getJson("/api/events/{$event->id}");

        $response->assertStatus(403);
        $response->assertJsonFragment([
            'message' => 'You are not authorized to view events',
        ]);
    }

    /** @test */
    public function destroy_deletes_event_by_id()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $event = Event::factory()->create();

        $response = $this->deleteJson("/api/events/{$event->id}");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'message' => 'Event deleted successfully',
            'event' => [
                'id' => $event->id,
                'name' => $event->name,
                'description' => $event->description,
                'latitude' => $event->getLatLong()['latitude'],
                'longitude' => $event->getLatLong()['longitude'],
            ],
        ]);
        $this->assertDeleted($event);
    }

    /** @test */
    public function destroy_returns_404_if_event_not_found()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->deleteJson('/api/events/999');

        $response->assertStatus(404);
        $response->assertJsonFragment([
            'message' => 'Event not found',
        ]);
    }

    /** @test */
    public function destroy_returns_403_if_user_does_not_have_permission()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $event = Event::factory()->create();

        $response = $this->deleteJson("/api/events/{$event->id}");

        $response->assertStatus(403);
        $response->assertJsonFragment([
            'message' => 'You are not authorized to delete events',
        ]);
    }
}
