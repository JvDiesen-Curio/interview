<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

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
}
