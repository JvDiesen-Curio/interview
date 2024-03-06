<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AssignRoleController extends Controller
{

    public  function create()
    {

        $users = User::all();
        $roles = Role::all();

        return view('assignRole.create', ['users' => $users, 'roles' => $roles]);
    }

    public function store()
    {
        $data = request()->validate([
            'userId' => ['required', 'numeric'],
            'roleId' => ['required', 'numeric'],
        ]);

        $user = User::findOrFail($data['userId']);
        $role = Role::findOrFail($data['roleId']);

        $user->assignRole($role->name);

        return redirect()->route('dashboard');
    }
}
