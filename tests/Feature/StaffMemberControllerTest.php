<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\StaffMember;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StaffMemberControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function CreateStaffMember()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);

        $response = $this->actingAs($user)->get(route('staff.create'));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('staff.create');
    }
    /** @test */
    public function CreateStaffMemberForbidden()
    {
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);

        $response = $this->actingAs($user)->get(route('staff.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function StoreStaffMember()
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $data = [
            'name' => $this->faker->name,
            'role' => $this->faker->jobTitle,
            'beschrijving' => $this->faker->paragraph,
            'email' => $this->faker->email,
            'img_url' => UploadedFile::fake()->image('avatar.jpg'),
            'video' => UploadedFile::fake()->create('video.mp4'),
            'phone' => $this->faker->phoneNumber,
            'instagram' => $this->faker->userName,
            'facebook' => $this->faker->userName,
            'linkedin' => $this->faker->userName,
            'user_id' => $user->id,
        ];

        $response = $this->actingAs($user)->post(route('staff.store'), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect(route('staff'));
        $this->assertDatabaseHas('staff_members', ['name' => $data['name']]);
    }
    /** @test */
    public function StoreStaffMemberForbidden()
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);

        $data = [
            'name' => $this->faker->name,
            'role' => $this->faker->jobTitle,
            'beschrijving' => $this->faker->paragraph,
            'email' => $this->faker->email,
            'img_url' => UploadedFile::fake()->image('avatar.jpg'),
            'video' => UploadedFile::fake()->create('video.mp4'),
            'phone' => $this->faker->phoneNumber,
            'instagram' => $this->faker->userName,
            'facebook' => $this->faker->userName,
            'linkedin' => $this->faker->userName,
            'user_id' => $user->id,
        ];

        $response = $this->actingAs($user)->post(route('staff.store'), $data);
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function UpdateStaffMember()
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $staffMember = StaffMember::first();
        $data = [
            'name' => $this->faker->name,
            'role' => $this->faker->jobTitle,
            'beschrijving' => $this->faker->paragraph,
            'email' => $this->faker->email,
            'img_url' => UploadedFile::fake()->image('avatar.jpg'),
            'video' => UploadedFile::fake()->create('video.mp4'),
            'phone' => $this->faker->phoneNumber,
            'instagram' => $this->faker->userName,
            'facebook' => $this->faker->userName,
            'linkedin' => $this->faker->userName,
            'user_id' => $user->id,
        ];
        $response = $this->actingAs($user)->put(route('staff.update', $staffMember->id), $data);
        $response->assertRedirect(route('staff'));
        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertDatabaseHas('staff_members', ['name' => $data['name']]);
    }
    /** @test */
    public function EditStaffMember()
    {
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);
        $staffMember = StaffMember::first();

        $response = $this->actingAs($user)->get(route('staff.edit', $staffMember->id));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('staff.edit');
        $response->assertViewHas('staffMember', $staffMember);
    }
    /** @test */
    public function EditStaffMemberForbidden()
    {
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);
        $staffMember = StaffMember::first();

        $response = $this->actingAs($user)->get(route('staff.edit', $staffMember->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function UpdateStaffMemberForbidden()
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);
        $staffMember = StaffMember::first();
        $data = [
            'name' => $this->faker->name,
            'role' => $this->faker->jobTitle,
            'beschrijving' => $this->faker->paragraph,
            'email' => $this->faker->email,
            'img_url' => UploadedFile::fake()->image('avatar.jpg'),
            'video' => UploadedFile::fake()->create('video.mp4'),
            'phone' => $this->faker->phoneNumber,
            'instagram' => $this->faker->userName,
            'facebook' => $this->faker->userName,
            'linkedin' => $this->faker->userName,
            'user_id' => $user->id,
        ];
        $response = $this->actingAs($user)->put(route('staff.update', $staffMember->id), $data);
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
    /** @test */
    public function DeleteStaffMember()
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $role = Role::findByName('Admin');
        $user->assignRole($role);

        $staffMember = StaffMember::factory()->create([
            'user_id' => $user->id,
            'image' => 'storage/staff/avatar.jpg',
            'video' => 'storage/staff/video.mp4',
            'email' => $this->faker->email,
            'name' => $this->faker->name,
            'role' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'phone' => $this->faker->phoneNumber,
            'instagram' => $this->faker->userName,
            'facebook' => $this->faker->userName,
            'linkedin' => $this->faker->userName
        ]);
        $response = $this->actingAs($user)->delete(route('staff.destroy', $staffMember->id));
        $response->assertRedirect(route('staffMembers'));
        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertDatabaseMissing('staff_members', ['id' => $staffMember->id]);
    }

    /** @test */
    public function DeleteStaffMemberForbidden()
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $role = Role::findByName('User');
        $user->assignRole($role);

        $staffMember = StaffMember::factory()->create([
            'user_id' => $user->id,
            'image' => 'storage/staff/avatar.jpg',
            'video' => 'storage/staff/video.mp4',
            'email' => $this->faker->email,
            'name' => $this->faker->name,
            'role' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'phone' => $this->faker->phoneNumber,
            'instagram' => $this->faker->userName,
            'facebook' => $this->faker->userName,
            'linkedin' => $this->faker->userName
        ]);
        $response = $this->actingAs($user)->delete(route('staff.destroy', $staffMember->id));
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
