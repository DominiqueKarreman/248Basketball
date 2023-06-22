<?php

use Tests\TestCase;
use App\Models\User;
use App\Models\UserFriend;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserFriendControllerApiTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexReturnsFriendsForAuthenticatedUser()
    {
        // Create a user and some friends
        $user = User::factory()->create();
        $friend1 = User::factory()->create();
        $friend2 = User::factory()->create();
        $friend3 = User::factory()->create();

        // Create some friend relationships
        UserFriend::factory()->create([
            'user_id' => $user->id,
            'friends_id' => $friend1->id,
            'is_mutual' => true,
        ]);
        UserFriend::factory()->create([
            'user_id' => $user->id,
            'friends_id' => $friend2->id,
            'is_mutual' => true,
        ]);
        UserFriend::factory()->create([
            'user_id' => $user->id,
            'friends_id' => $friend3->id,
            'is_mutual' => false,
        ]);

        // Make a request to the index method
        $response = $this->actingAs($user)->get(route('api.friends.index'));

        // Assert that the response contains the correct friends
        $response->assertStatus(200);
        $response->assertJsonCount(2);
    }



    public function test_it_returns_whatsapp_friends_for_authenticated_user()
    {
        $user = User::factory()->create();
        $whatsappFriend1 = User::factory()->create(['phone_number' => '123']);
        $whatsappFriend2 = User::factory()->create(['phone_number' => '456']);
        $nonWhatsappFriend = User::factory()->create();
        UserFriend::factory()->create([
            'user_id' => $user->id,
            'friends_id' => $whatsappFriend1->id,
            'is_mutual' => true,
        ]);

        $response = $this->actingAs($user)->get('/api/friends/provider:whatsapp');

        $response->assertStatus(200);
    }
}
