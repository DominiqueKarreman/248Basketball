<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Veld;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ApiVeldControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function AllVelden()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('api.velden.index'));
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function it_can_sort_velden_by_location()
    {
        $user = User::factory()->create();
        $latitude = 51.5074;
        $longitude = 0.1278;
        $response = $this->actingAs($user)->get(route('api.velden.locationSorted', [$latitude, $longitude]));
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function it_can_show_a_veld()
    {
        $user = User::factory()->create();

        $veld = Veld::factory()->create();
        $response = $this->actingAs($user)->get(route('api.velden.show', $veld->id));
        $response->assertStatus(Response::HTTP_OK);
    }
}
