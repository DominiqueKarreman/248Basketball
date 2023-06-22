<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\User;
use App\Models\Veld;
use App\Models\Group;
use App\Models\Pickup;
use App\Models\PickupPlayer;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PickupControllerApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_pickups()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('api.pickups.index'));
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function it_can_create_a_pickup_game()
    {
        $user = User::factory()->create();
        $veld = Veld::factory()->create();

        $response = $this->actingAs($user)->postJson(route('api.pickups.create'), [
            'name' => 'Test Pickup Game',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'max_players' => 10,
            'is_private' => true,
            'group_name' => 'Test Group',
            'player_ids' => [$user->id],
        ]);

        $response->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('pickups', [
            'name' => 'Test Pickup Game',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'max_players' => 10,
            'is_private' => true,
        ]);
    }

    /** @test */
    public function it_can_get_pickup_requests()
    {
        $user = User::factory()->create();
        $veld = Veld::first();
        $pickup = Pickup::factory()->create([
            'name' => 'Test Pickup Game',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'max_players' => 10,
            'is_private' => true,
            'group' => Group::create([
                'name' => 'Test Group',
                'creator' => $user->id,
            ])->id,
            'creator' => $user->id,
        ]);



        $response = $this->actingAs($user)->get(route('api.pickups.getPickupRequests'));
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function it_can_decide_pickup_invitation()
    {
        $user = User::factory()->create();
        $creatorUser = User::factory()->create();
        $veld = Veld::first();
        $group = Group::create([
            'name' => 'Test Group',
            'creator' => $user->id,
        ]);
        $pickup = Pickup::factory()->create([
            'name' => 'Test Pickup Game',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'max_players' => 10,
            'is_private' => true,
            'group' => $group->id,
            'creator' => $creatorUser->id,
        ]);

        $pickupPlayer = PickupPlayer::create([
            'group' => $group->id,
            'user' => $user->id,
            'pickup' => $pickup->id,
        ]);
        $response = $this->actingAs($user)->post(route('api.pickups.DecidePickupInvitation', $pickup->id), [
            'status' => 'accepted',
        ]);
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function it_can_remove_player_from_pickup()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $creatorUser = User::factory()->create();
        $veld = Veld::first();
        $group = Group::create([
            'name' => 'Test Group',
            'creator' => $user->id,
        ]);
        $pickup = Pickup::factory()->create([
            'name' => 'Test Pickup Game',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'max_players' => 10,
            'is_private' => true,
            'group' => $group->id,
            'creator' => $user->id,
        ]);
        $pickupPlayer = PickupPlayer::create([
            'group' => $group->id,
            'user' => $user->id,
            'pickup' => $pickup->id,
        ]);
        $response = $this->actingAs($user)->delete(route('api.pickups.removePlayerFromPickup', [$pickup->id, $pickupPlayer->user]));
        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseMissing('pickup_players', [
            'pickup' => $pickup->id,
            'user' => $user->id,
        ]);
    }

    /** @test */
    public function it_can_invite_to_pickup()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $otherUser = User::factory()->create();
        $veld = Veld::first();
        $group = Group::create([
            'name' => 'Test Group',
            'creator' => $user->id,
        ]);
        $pickup = Pickup::factory()->create([
            'name' => 'Test Pickup Game',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'max_players' => 10,
            'is_private' => true,
            'group' => $group->id,
            'creator' => $user->id,
        ]);
        $pickupPlayer = PickupPlayer::create([
            'group' => $group->id,
            'user' => $user->id,
            'pickup' => $pickup->id,
        ]);
        $response = $this->actingAs($user)->post(route('api.pickups.inviteToPickup', $pickup->id), [
            'user_ids' => [$otherUser->id],
        ]);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas('pickup_players', [
            'pickup' => $pickup->id,
            'user' => $otherUser->id,
            'accepted' => false,
        ]);
    }

    /** @test */
    public function it_can_get_pickup_players()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $otherUser = User::factory()->create();
        $veld = Veld::first();
        $group = Group::create([
            'name' => 'Test Group',
            'creator' => $user->id,
        ]);
        $pickup = Pickup::factory()->create([
            'name' => 'Test Pickup Game',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'max_players' => 10,
            'is_private' => true,
            'group' => $group->id,
            'creator' => $user->id,
        ]);

        $response = $this->actingAs($user)->get(route('api.pickups.getPickupPlayers', $pickup->id));
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function it_can_activate_pickup()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $otherUser = User::factory()->create();
        $veld = Veld::first();
        $group = Group::create([
            'name' => 'Test Group',
            'creator' => $user->id,
        ]);
        $pickup = Pickup::factory()->create([
            'name' => 'Test Pickup Game',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'max_players' => 10,
            'is_private' => true,
            'group' => $group->id,
            'creator' => $user->id,
        ]);
        $response = $this->actingAs($user)->put(route('api.pickups.activatePickup', $pickup->id));
        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas('pickups', [
            'id' => $pickup->id,
            'is_active' => true,
        ]);
    }

    /** @test */
    public function it_can_deactivate_pickup()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $otherUser = User::factory()->create();
        $veld = Veld::first();
        $group = Group::create([
            'name' => 'Test Group',
            'creator' => $user->id,
        ]);
        $pickup = Pickup::factory()->create([
            'name' => 'Test Pickup Game',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'max_players' => 10,
            'is_private' => true,
            'group' => $group->id,
            'creator' => $user->id,
        ]);
        $response = $this->actingAs($user)->put(route('api.pickups.deactivatePickup', $pickup->id));
        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas('pickups', [
            'id' => $pickup->id,
            'is_active' => false,
        ]);
    }

    /** @test */
    public function it_can_update_pickup()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $otherUser = User::factory()->create();
        $veld = Veld::first();
        $group = Group::create([
            'name' => 'Test Group',
            'creator' => $user->id,
        ]);
        $pickup = Pickup::factory()->create([
            'name' => 'Test Pickup Game',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'max_players' => 10,
            'is_private' => true,
            'group' => $group->id,
            'creator' => $user->id,
        ]);
        $response = $this->actingAs($user)->put(route('api.pickups.updatePickup', $pickup->id), [
            'name' => 'Test Pickup Game2',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '14:00:00',
            'max_players' => 15,
            'is_private' => true,
            'group' => $group->id,
            'creator' => $user->id,
        ]);
        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas('pickups', [
            'name' => 'Test Pickup Game2',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '14:00:00',
            'max_players' => 15,
            'is_private' => true,
            'group' => $group->id,
            'creator' => $user->id,
        ]);
    }

    /** @test */
    public function it_can_add_game_result()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $otherUser = User::factory()->create();
        $veld = Veld::first();
        $group = Group::create([
            'name' => 'Test Group',
            'creator' => $user->id,
        ]);
        $pickup = Pickup::factory()->create([
            'name' => 'Test Pickup Game',
            'description' => 'This is a test pickup game',
            'veld' => $veld->id,
            'date' => '2022-01-01',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'max_players' => 10,
            'is_private' => true,
            'group' => $group->id,
            'creator' => $user->id,
        ]);
        $response = $this->actingAs($user)->post(route('api.pickups.addGameResult', $pickup->id), [
            'winners' => [$user->id],
            'losers' => [$otherUser->id],
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function it_can_get_users_to_invite()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $response = $this->actingAs($user)->get(route('api.pickups.usersToInvite'));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonFragment([
            'id' => $otherUser->id,
            'name' => $otherUser->name,
            'email' => $otherUser->email,
        ]);
    }
}
