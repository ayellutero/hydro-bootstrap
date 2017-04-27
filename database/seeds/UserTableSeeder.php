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

        $user->firstname = 'User';
        $user->lastname = 'User';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user); // attach a role to a user

        $head = new User();
        $head->firstname = 'Head';
        $head->lastname = 'Head';
        $head->employee_id = '201235784';
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

        $admin = new User();
        $admin->firstname = 'Admin';
        $admin->lastname = 'Two';
        $admin->employee_id = '201235784';
        $admin->position = 'Admin';
        $admin->email = 'admin2@example.com';
        $admin->password = 'adminadmin';
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Two';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user2@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Three';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user3@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Four';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user4@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Five';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user5@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Six';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user6@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Seven';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user7@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Eight';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user8@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Nine';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user9@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Ten';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user10@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Eleven';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user11@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Twelve';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user12@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->firstname = 'User';
        $user->lastname = 'Thirteen';
        $user->employee_id = '201235784';
        $user->position = 'User';
        $user->email = 'user13@example.com';
        $user->password = 'useruser';
        $user->save();
        $user->roles()->attach($role_user);
    }
}
