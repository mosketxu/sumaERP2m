<?php

use Faker\Generator as Faker;

$factory->define(App\CondicionFacturacion::class, function (Faker $faker) {
    return [
        'formapago_id' => \App\FormaPago::all()->random()->id,
        'periodopago_id' => \App\PeriodoPago::all()->random()->id,
        'diafactura' => '1',
        'diavencimiento' => $faker->randomElement([10, 25]),
    ];
});
