<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        app(PermissionRegistrar::class)->forgetCachedPermissions();
        app()['cache']->forget('spatie.permission.cache');
        //
        $role = Role::create(['name' => 'Admin']);
        $role_moderator = Role::create(['name' => 'Moderator']);
        $role_user = Role::create(['name' => 'User']);
        
        //velden permissions
         
        $permission = Permission::create(['name' => 'create velden']);
        $permission = Permission::create(['name' => 'view velden']);
        $permission = Permission::create(['name' => 'edit velden']);
        $permission = Permission::create(['name' => 'delete velden']);
        
        //users permissions

        $permission = Permission::create(['name' => 'create users']);
        $permission = Permission::create(['name' => 'view users']);
        $permission = Permission::create(['name' => 'edit users']);
        $permission = Permission::create(['name' => 'delete users']);

        //roles permissions

        $permission = Permission::create(['name' => 'create roles']);
        $permission = Permission::create(['name' => 'view roles']);
        $permission = Permission::create(['name' => 'edit roles']);
        $permission = Permission::create(['name' => 'delete roles']);
        $permission = Permission::create(['name' => 'assign roles']);

        //permissions permissions

        $permission = Permission::create(['name' => 'create permissions']);
        $permission = Permission::create(['name' => 'view permissions']);
        $permission = Permission::create(['name' => 'edit permissions']);
        $permission = Permission::create(['name' => 'delete permissions']);
        
        //events permissions

        $permission = Permission::create(['name' => 'create events']);
        $permission = Permission::create(['name' => 'view events']);
        $permission = Permission::create(['name' => 'edit events']);
        $permission = Permission::create(['name' => 'delete events']);
        
        $permission = Permission::create(['name' => 'create pickups']);
        $permission = Permission::create(['name' => 'view pickups']);
        $permission = Permission::create(['name' => 'edit pickups']);
        $permission = Permission::create(['name' => 'delete pickups']);
        
        $role->givePermissionTo(Permission::all());
        $role_moderator->givePermissionTo(Permission::all());
        $role_moderator->revokePermissionTo('assign roles');

        Permission::all()->each(function ($permission) {
            $permission->assignRole('admin');
        });
       

    }
}