<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTokenControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Set up the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    /**
     * Test the API token permissions.
     *
     * @return void
     */
    public function testApiTokenPermissions()
    {
        // Create a user with the 'create api tokens' permission
        $user = User::factory()->create();
        // create permission
        $permission = Permission::findByName('create api tokens');
        $role = Role::findByName('Admin');
        $user->assignRole($role);

        // assign permission to user
        $user->givePermissionTo($permission);
        // create api token
        //visit roles.index
        $response = $this->actingAs($user)->get(route('roles.index'));
        // assert status
        $response->assertStatus(Response::HTTP_OK);
    }
}
