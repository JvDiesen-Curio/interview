<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {


        return view('role.index', ['roles' => Role::all()]);
    }

    public  function create()
    {
        return view('role.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'unique:' .  Role::class . ',name']
        ]);


        Role::create(['name' => $data['name']]);
        return redirect()->route('assignRole.create');
    }

    public function edit(Role $role)
    {

        $permissions = Permission::all();

        foreach ($role->permissions as $rolePermission) {
            foreach ($permissions as $permission) {
                if ($rolePermission->name === $permission->name) {
                    $permission['set'] = true;
                    break;
                }
            }
        }



        return view('role.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    public function update(Role $role)
    {
        $permissions = Permission::all();
        $rules = ['name' => ['required']];

        if (!($role->name === Request()->get('name'))) {
            $rules['name'] = ['required', 'unique:' .  Role::class . ',name'];
        }

        // foreach ($permissions as $permission) {
        //     $rules[$permission->name] = ['string'];
        // }

        $data = Request()->validate($rules);

        // role 
        $role->name = $data['name'];
        $role->update();

        $formPermissions = request()->all();

        unset($formPermissions['_token']);
        unset($formPermissions['_method']);
        unset($formPermissions['name']);

        foreach ($permissions as $permission) {
            foreach (array_keys($formPermissions) as $formPermissionkey) {
                dd($permission->name, $formPermissionkey);
                if ($formPermissionkey === $permission->name) {

                    $role->givePermissionTo($permission->name);
                }
            }
        }
    }
}
