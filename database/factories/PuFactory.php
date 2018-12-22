<?php

use Faker\Generator as Faker;

$factory->define(App\Pu::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'ce'=>$faker->word,
        'us' => $faker->word,
        'pw' => $faker->numberBetween(1,10000),
    ];
});
