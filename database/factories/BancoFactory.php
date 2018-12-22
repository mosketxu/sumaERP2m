<?php

use Faker\Generator as Faker;

$factory->define(App\Banco::class, function (Faker $faker) {
    return [
        'bank_id' => \App\Bank::all()->random()->id,
        'iban' => $faker->bankAccountNumber,
        'principal' => '1',
    ];
});
