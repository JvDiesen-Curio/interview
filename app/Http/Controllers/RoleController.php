<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    function create()
    {

        $users = User::all();
        $roles = Role::all();

        return view('role.create', ['users' => $users, 'roles' => $roles]);
    }

    function store()
    {
        $data = request()->validate([
            'userId' => ['required', 'numeric'],
            'roleId' => ['required', 'numeric'],
        ]);

        $user = User::findOrFail($data['userId']);
    }
}
