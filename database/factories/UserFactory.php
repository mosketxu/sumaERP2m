<?php

use Faker\Generator as Faker;
use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\User::class, function (Faker $faker) {
    $name = $faker->firstName;
    $lastname = $faker->lastName;
    return [
        'name' => $name,
        'lastname' => $lastname,
        'slug' => str_slug($name, '-', $lastname, '-'),
        'role_id' => Arr::random(['1', '2', '3']),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$12$JXWcceKqi5JiRcpMGHCxVOwibcRyh8Vn8suBh/FuDfw5F7VrIbvDi', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->state(App\User::class, 'admin', function (Faker $faker) {
    return ['role_id' => '1'];
});
