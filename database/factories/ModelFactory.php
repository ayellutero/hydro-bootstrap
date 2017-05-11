<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Report::class, function (Faker\Generator $faker) {
    
    return [

        'emp_id' => 1,
        'station_id' => 1,
        'station_name' => 'edit',
        'location'  => 'edit',
        'sensor_type'  => 'edit',
        'date_assessed' => $faker->date,
        'problem' => $faker->word,
        'work_tdone' => $faker->word,
        'last_data' => $faker->word,
        'init_remarks' => $faker->word,
        'date_visited' => $faker->date,
        'actual_defects' => $faker->word,
        'work_done' => $faker->word,
        'part_replaced' => $faker->word,
        'tp_results' => $faker->word,
        'rc_performed' => $faker->word,
        'onsite_remarks' => $faker->word,
        'conducted_by' => 1,
        'c_position' => 1,

    ];
});