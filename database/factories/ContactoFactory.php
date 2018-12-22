<?php

use Faker\Generator as Faker;

$factory->define(App\Contacto::class, function (Faker $faker) {
    $name=$faker->firstName;
    $lastname=$faker->lastName;

    return [
        'departamento_id'=>\App\Departamento::all()->random()->id,
        'esfacturacion' => '0',
        'name' => $name,
        'lastname'=>$lastname,
        'slug' => str_slug($name . " " . $lastname, '-'),
        'email1' => $faker->safeEmail,
        'telefono1' => $faker->phoneNumber,
    ];
});
