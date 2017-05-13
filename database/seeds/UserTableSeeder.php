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
        $role_head = Role::where('name', 'Head')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'User';
        $user->employee_id = '123456';
        $user->position = 'User';
        $user->email = 'user@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user); // attach a role to a user

        $head = new User();
        $head->firstname = 'Head';
        $head->lastname = 'Head';
        $head->employee_id = '654321';
        $head->position = 'Head';
        $head->email = 'head@example.com';
        $head->password = 'headhead';
        $head->save();
        $head->roles()->attach($role_head); // attach a role to a user

        $admin = new User();
        $admin->firstname = 'Admin';
        $admin->lastname = 'Admin';
        $admin->employee_id = '201235784';
        $admin->position = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = 'adminadmin';
        $admin->save();
        $admin->roles()->attach($role_admin); // attach a role to a user
    }
}
