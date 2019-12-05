<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesHasPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions=Permission::all();     
        $superadmin=Role::find(1);
        $admin=Role::find(2);
        foreach($permissions as $permission )
        {
            $superadmin->givePermissionTo($permission->name);
            $admin->givePermissionTo($permission->name);
        }

       




    }
}
