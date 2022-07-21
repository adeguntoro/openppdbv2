<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role1 = Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'teacher']);
        //$role->givePermissionTo('edit articles');

        // or may be done by chaining
        //$role = Role::create(['name' => 'moderator'])->givePermissionTo(['publish articles', 'unpublish articles']);

        //$role = Role::create(['name' => 'super-admin']);
   
        /*
        User::create([
            'name' => 'Ade Guntoro',
            'email' => 'guntoroade@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'), // password
            'remember_token' => Str::random(10),
        ])->assignRole($role1);
        */
        User::create([
            'name' => 'Guru',
            'email' => 'guru@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'), // password
            'remember_token' => Str::random(10),
        ])->assignRole('teacher');

        User::create([
            'name' => 'Murid',
            'email' => 'murid@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'), // password
            'remember_token' => Str::random(10),
        ])->assignRole('student');
    }
}
