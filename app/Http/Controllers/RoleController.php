<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreVeldRequest;
use App\Http\Requests\UpdateVeldRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!auth()->user()->hasPermissionTo('view roles')) {
            abort('403');
        } 

        $roles = Role::select('id', 'name')->withCount('permissions')->orderBy('name')->get();
        // dd($roles);


        return view('permissions.roleAndPermission', [
            'roles' => $roles,
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!auth()->user()->hasPermissionTo('create roles')) {
            abort('403');
        }

        return view('roles.create', [
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (!auth()->user()->hasPermissionTo('create roles')) {
            abort('403');
        }
        // dd($request->all());
        $role = Role::create(['name' => $request->role_name, 'guard_name' => 'web']);
        foreach($request->all() as $key => $permission){
            if($permission == 'true'){
                // dd([$key => $permission]);
                $explodedKey = explode('_', $key);
                $correctKey = $explodedKey[0] . ' ' . $explodedKey[1];
                // dd($correctKey, $key);
                $role->givePermissionTo($correctKey);
            }
            // if($permission )
        }

        return redirect()->route('roles.index')->banner('Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Veld $veld)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($role)
    {
        
        //find role with id and return view with role and permissions
        $role = Role::select('id', 'name')->withCount('permissions')->where('id', $role)->first();
        
        $rolePermission = $role->permissions->pluck('name')->toArray();
        $array = [];
        foreach (Permission::all() as $permission) {
            if($permission->name == 'assign roles'){
                continue;
            }
            if (!in_array($permission->name, $rolePermission)) {
                
                array_push($array, ['name' => $permission->name, 'checked' => '']);
            } else {
                array_push($array, ['name' => $permission->name, 'checked' => 'checked']);
            }
        }
        // dd($rolePermission, $array);
        return view('roles.edit', [
            'role' => $role,
            'permissions' => $rolePermission,
            'array' => $array,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $role)
    {
        // Update the Veld model with the new data from the request
       
        
    
        // Redirect back to the index page
        return redirect()->route('velden.index')->banner('Veld updated successfully.');
    }

    public function permissionUpdate(Request $request, $id)
    {
        if (!auth()->user()->hasPermissionTo('edit roles')) {
            abort('403');
        } 


        // Update the Veld model with the new data from the request
        $role = Role::find($id);
        // dd($request->all()); 
        $role->revokePermissionTo(Permission::all());
        foreach($request->all() as $key => $permission){
            if($permission == 'true'){
                // dd([$key => $permission]);
                $explodedKey = explode('_', $key);
                $correctKey = $explodedKey[0] . ' ' . $explodedKey[1];
                // dd($correctKey, $key);
                $role->givePermissionTo($correctKey);
            }
            // if($permission )
        }
        // $role->syncPermissions($request->permissions);
        // Redirect back to the index page
        return redirect()->route('roles.index')->banner('Veld updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Role::destroy($id);
        return redirect()->route('roles.index')->banner('Role deleted successfully.');
    }
}
