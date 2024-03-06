<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder  extends Seeder
{

    function run(): void
    {

        $role = Role::create(['name' => 'admin']);

        Permission::create(['name' => "create project"]);
    }
}
