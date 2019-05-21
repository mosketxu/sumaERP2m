<?php

use Faker\Generator as Faker;

$factory->define(App\Pu::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'ce'=>$faker->word,
        'us' => $faker->word,
        'pu' => $faker->numberBetween(1,10000),
    ];
});
