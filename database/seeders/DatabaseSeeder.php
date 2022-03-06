<?php

namespace Database\Seeders;

use App\Models\CityManager;
use App\Models\Coach;
use App\Models\Gym;
use App\Models\GymManager;
use App\Models\GymMember;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //un-hash this to generate dummy data
        $numberOfUsers=300;
        // User::factory(10)->create();
        GymMember::factory(10)->create();
        CityManager::factory(10)->create();
        // Gym::factory(5)->create();
        Coach::factory(5)->create();
        GymManager::factory(5)->create();

        //un-hash this to generate rules
    //     app()[PermissionRegistrar::class]->forgetCachedPermissions();

    //     // create permissions
    //     Permission::create(['name' => 'create gym manager']);
    //     Permission::create(['name' => 'create city manager']);
    //     Permission::create(['name' => 'create gym']);
    //     Permission::create(['name' => 'create city']);
    //     Permission::create(['name' => 'create coach']);
    //     Permission::create(['name' => 'create package']);
    //     Permission::create(['name' => 'create session']);

    //     // update permissions
    //     Permission::create(['name' => 'edit gym manager']);
    //     Permission::create(['name' => 'edit city manager']);
    //     Permission::create(['name' => 'edit gym']);
    //     Permission::create(['name' => 'edit city']);
    //     Permission::create(['name' => 'edit coach']);
    //     Permission::create(['name' => 'edit package']);
    //     Permission::create(['name' => 'edit session']);

    //     // delete permissions
    //     Permission::create(['name' => 'delete gym manager']);
    //     Permission::create(['name' => 'delete city manager']);
    //     Permission::create(['name' => 'delete gym']);
    //     Permission::create(['name' => 'delete city']);
    //     Permission::create(['name' => 'delete coach']);
    //     Permission::create(['name' => 'delete package']);
    //     Permission::create(['name' => 'delete session']);

    //     // show permissions
    //     Permission::create(['name' => 'show gym manager']);
    //     Permission::create(['name' => 'show city manager']);
    //     Permission::create(['name' => 'show gym']);
    //     Permission::create(['name' => 'show city']);
    //     Permission::create(['name' => 'show coach']);
    //     Permission::create(['name' => 'show package']);
    //     Permission::create(['name' => 'show session']);
    //     Permission::create(['name' => 'show attendance']);

    //     // ban or unban permission
    //     Permission::create(['name' => 'ban gym manager']);
    //     Permission::create(['name' => 'unban gym manager']);

    //     // buy package permissions
    //     Permission::create(['name' => 'buy package']);

    //     // assign coach
    //     Permission::create(['name' => 'assign coach']);

    //     // create roles and assign created permissions

    //     // ROLES

    //     $cityManagerRole = Role::create(['name' => 'cityManager']);

    //     $cityManagerRole->givePermissionTo(['create gym','create gym manager','create coach','create session','edit gym manager','edit gym','edit coach','edit session','delete gym manager','delete gym','delete coach','delete session','show gym manager','show gym','show coach','show package','show session','show attendance','buy package','assign coach','ban gym manager','unban gym manager']);

    //     $gymManagerRole = Role::create(['name' => 'gymManager']);

    //     $gymManagerRole->givePermissionTo(['create session','edit session','delete session','show session','show coach','show package','show attendance','buy package','assign coach']);

    //     $adminRole = Role::create(['name' => 'admin']);

    //     $adminRole->givePermissionTo(Permission::all());
     }
}
