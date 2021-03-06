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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Project::class, function(\Faker\Generator $faker) {
    return [
        'parent_id' => $faker->randomDigit,
        'user_id' => App\Models\User::all()->random()->first()->id,
        'key_id' => App\Models\Key::all()->random()->first()->id,
        'tempo' => $faker->numberBetween(60, 180),
        'length' => $faker->randomElement([16, 32, 64]),
    ];
});
