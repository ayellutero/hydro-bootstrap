<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class); // create create Role first b4 using in UserTable
        $this->call(UserTableSeeder::class);
    }
}
