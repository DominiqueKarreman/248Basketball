<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role = Role::create(['name' => 'admin']);
        $role_user = Role::create(['name' => 'user']);
        
        //velden permissions
         
        $permission = Permission::create(['name' => 'create velden']);
        $permission = Permission::create(['name' => 'view velden']);
        $permission = Permission::create(['name' => 'edit velden']);
        $permission = Permission::create(['name' => 'delete velden']);
        
        $role->givePermissionTo(Permission::all());
       

    }
}