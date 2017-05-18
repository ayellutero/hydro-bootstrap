<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'User';
        $user->employee_id = '123456';
        $user->designation = 'ARD';
        $user->email = 'user@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user); // attach a role to a user

        $admin = new User();
        $admin->firstname = 'Admin';
        $admin->lastname = 'Admin';
        $admin->employee_id = '201235784';
        $admin->designation = 'RD';
        $admin->email = 'admin@example.com';
        $admin->password = 'adminadmin';
        $admin->save();
        $admin->roles()->attach($role_admin); // attach a role to a user
    }
}
