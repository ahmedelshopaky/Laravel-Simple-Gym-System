<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create gym manager']);
        Permission::create(['name' => 'create city manager']);
        Permission::create(['name' => 'create gym']);
        Permission::create(['name' => 'create city']);
        Permission::create(['name' => 'create coach']);
        Permission::create(['name' => 'create package']);
        Permission::create(['name' => 'create session']);

        // update permissions
        Permission::create(['name' => 'edit gym manager']);
        Permission::create(['name' => 'edit city manager']);
        Permission::create(['name' => 'edit gym']);
        Permission::create(['name' => 'edit city']);
        Permission::create(['name' => 'edit coach']);
        Permission::create(['name' => 'edit package']);
        Permission::create(['name' => 'edit session']);

        // delete permissions
        Permission::create(['name' => 'delete gym manager']);
        Permission::create(['name' => 'delete city manager']);
        Permission::create(['name' => 'delete gym']);
        Permission::create(['name' => 'delete city']);
        Permission::create(['name' => 'delete coach']);
        Permission::create(['name' => 'delete package']);
        Permission::create(['name' => 'delete session']);

        // Retrieve permissions
        Permission::create(['name' => 'retrieve gym manager']);
        Permission::create(['name' => 'retrieve city manager']);
        Permission::create(['name' => 'retrieve gym']);
        Permission::create(['name' => 'retrieve city']);
        Permission::create(['name' => 'retrieve coach']);
        Permission::create(['name' => 'retrieve package']);
        Permission::create(['name' => 'retrieve session']);
        Permission::create(['name' => 'retrieve attendance']);

        // ban or unban permission
        Permission::create(['name' => 'ban gym manager']);
        Permission::create(['name' => 'unban gym manager']);

        // buy package permissions
        Permission::create(['name' => 'buy package']);

        // assign coach
        Permission::create(['name' => 'assign coach']);

        // create roles and assign created permissions

        // ROLES

        $cityManagerRole = Role::create(['name' => 'cityManager']);

        $cityManagerRole->givePermissionTo(['create gym','create gym manager','create coach','create session','edit gym manager','edit gym','edit coach','edit session','delete gym manager','delete gym','delete coach','delete session','retrieve gym manager','retrieve gym','retrieve coach','retrieve package','retrieve session','retrieve attendance','buy package','assign coach','ban gym manager','unban gym manager']);

        $gymManagerRole = Role::create(['name' => 'gymManager']);

        $gymManagerRole->givePermissionTo(['create session','edit session','delete session','retrieve session','retrieve coach','retrieve package','retrieve attendance','buy package','assign coach']);

        $adminRole = Role::create(['name' => 'admin']);

        $adminRole->givePermissionTo(Permission::all());
    }
}
