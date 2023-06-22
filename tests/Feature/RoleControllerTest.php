<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\RoleController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

use App\Models\User;

class RoleControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $permission = Permission::findByName('view roles');
        $user->assignRole($role);
        $role->givePermissionTo($permission);

        $response = $this->actingAs($user)->get(route('roles.index'));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('permissions.roleAndPermission');
    }
    public function testIndexForbidden()
    {
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $permission = Permission::findByName('view roles');
        $user->assignRole($role);


        $response = $this->actingAs($user)->get(route('roles.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testCreate()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $permission = Permission::findByName('create roles');
        $user->assignRole($role);
        $role->givePermissionTo($permission);

        $response = $this->actingAs($user)->get(route('roles.create'));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('roles.create');
        $response->assertViewHas('permissions', function ($permissions) {
            return $permissions->count() > 0;
        });
    }
    public function testCreateForbidden()
    {
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $permission = Permission::findByName('create roles');
        $user->assignRole($role);


        $response = $this->actingAs($user)->get(route('roles.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $permission = Permission::findByName('create roles');
        $user->assignRole($role);
        $role->givePermissionTo($permission);
        $data = [
            'role_name' => $this->faker->name,
        ];
        $response = $this->actingAs($user)->post(route('roles.store'), $data);
        $response->assertStatus(Response::HTTP_FOUND);

        $response->assertRedirect(route('roles.index'));
    }
    public function testStoreForbidden()
    {
        $user = User::factory()->create();
        $role = Role::findByName('User');

        $user->assignRole($role);

        $data = [
            'role_name' => $this->faker->name,
        ];
        $response = $this->actingAs($user)->post(route('roles.store'), $data);
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testEdit()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $response = $this->actingAs($user)->get(route('roles.edit', $role->id));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('roles.edit');
    }

    public function testEditForbidden()
    {
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);
        $response = $this->actingAs($user)->get(route('roles.edit', $role->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testUpdate()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $newRole = Role::create(['name' => $this->faker->name, 'guard_name' => 'web']);


        $data = [
            'role_name' => $this->faker->name,
        ];

        $response = $this->actingAs($user)->put(route('roles.update', $newRole->id), $data);

        $response->assertRedirect(route('velden.index'));
    }
    public function testUpdateForbidden()
    {
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);
        $newRole = Role::create(['name' => $this->faker->name, 'guard_name' => 'web']);


        $data = [
            'role_name' => $this->faker->name,
        ];

        $response = $this->actingAs($user)->put(route('roles.update', $newRole->id), $data);
        $response->assertStatus(Response::HTTP_FORBIDDEN);
        // $response->assertRedirect(route('velden.index'));
    }

    public function testPermissionUpdate()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $permission = Permission::findByName('create roles');
        $role->givePermissionTo($permission);
        $data = [
            $permission->name => 'false',
        ];

        $response = $this->actingAs($user)->put(route('roles.permissions.update', $role->id), $data);

        $response->assertRedirect(route('roles.index'));
        $this->assertDatabaseMissing('role_has_permissions', [
            'permission_id' => $permission->id,
            'role_id' => $role->id,
        ]);
    }

    public function testDestroy()
    {
        $user = User::factory()->create();
        $userRole = Role::findByName('Admin');
        $user->assignRole($userRole);

        $role = Role::create(['name' => $this->faker->name, 'guard_name' => 'web']);
        $response = $this->actingAs($user)->delete(route('roles.destroy', $role->id));
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect(route('roles.index'));
        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }
    public function testDestroyForbidden()
    {
        $user = User::factory()->create();
        $userRole = Role::findByName('User');
        $user->assignRole($userRole);

        $role = Role::create(['name' => $this->faker->name, 'guard_name' => 'web']);
        $response = $this->actingAs($user)->delete(route('roles.destroy', $role->id));
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
