<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndexRequiresPermission()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('users.index'));
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testIndexDisplaysUsers()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);
        $permission = Permission::findByName('view users');
        $user->givePermissionTo($permission);
        $response = $this->actingAs($user)->get(route('users.index'));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewHas('users');
    }

    public function testRegisterCreatesUser()
    {
        $this->withoutExceptionHandling();
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'geboorte_datum' => $this->faker->date(),
            'terms' => true,
        ];
        $response = $this->postJson(route('register'), $data);
        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('users', [
            'email' => $data['email'],
        ]);
    }

    public function testLoginWithCorrectCredentials()
    {
        $this->withoutExceptionHandling();
        $password = 'password';
        $user = User::factory()->create([
            'password' => bcrypt($password),
        ]);
        $data = [
            'email' => $user->email,
            'password' => $password,
        ];
        $response = $this->postJson(route('login'), $data);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testLoginWithIncorrectCredentials()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $data = [
            'email' => $user->email,
            'password' => 'wrongpassword',
        ];
        $this->expectException(\Illuminate\Validation\ValidationException::class);
        $this->expectExceptionMessage('These credentials do not match our records.');
        $response = $this->postJson(route('login'), $data);
    }



    public function testEditRequiresPermission()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('users.edit', $user->id));
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testEditDisplaysUser()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        //get view roles permission from db
        $permission = Permission::findByName('view roles');

        $user->givePermissionTo($permission);
        $response = $this->actingAs($user)->get(route('users.edit', $user->id));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewHas('user');
    }


    public function testChangeRolesUpdatesUserRoles()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $permission = Permission::findByName('view roles');
        $user->givePermissionTo($permission);
        $role = Role::create(['name' => 'test role']);
        $data = [
            'user_role' => $role->name,
        ];
        $response = $this->actingAs($user)->put(route('users.changeRoles', $user->id), $data);
        $response->assertRedirect(route('users.index'));
        $this->assertTrue($user->hasRole($role->name));
    }
}
