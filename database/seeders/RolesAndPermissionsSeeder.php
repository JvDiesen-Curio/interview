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

        $permissionCreateProject =   Permission::create(['name' => "create project"]);

        $permissionCreateTeam =   Permission::create(['name' => "create team"]);
        $permissionReadTeam =   Permission::create(['name' => "read team"]);
        $permissionEditTeam =   Permission::create(['name' => "edit team"]);
        $permissionDeleteTeam =   Permission::create(['name' => "delete project"]);




        $role->givePermissionTo($permissionCreateProject->name);
        $role->givePermissionTo($permissionCreateTeam->name);
        $role->givePermissionTo($permissionReadTeam->name);
        $role->givePermissionTo($permissionEditTeam->name);
        $role->givePermissionTo($permissionDeleteTeam->name);
    }
}
