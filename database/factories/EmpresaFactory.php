<?php

use Faker\Generator as Faker;

$factory->define(App\Empresa::class, function (Faker $faker) {
    $tipoempresa = $faker->randomElement([\App\TipoEmpresa::CLIENTE, \App\TipoEmpresa::PROVEEDOR, \App\TipoEmpresa::CLIENTEPROVEEDOR, \App\TipoEmpresa::INTERNO, \App\TipoEmpresa::OTROS]);
    $name = $faker->company;

    return [
        'name' => $name,
        'slug' => str_slug($name, '-'),
        'tipoempresa_id' => $tipoempresa,
        'direccion' => $faker->address,
        'codpostal' => $faker->postcode,
        'localidad' => $faker->city,
        'provincia_id' => \App\Provincia::all()->random()->id,
        'pais_id' => 'ES',
        'cifnif' => $faker->ean8,
        'tfno' => $faker->e164PhoneNumber,
        'email' => $faker->companyEmail,
        'web' => $faker->url,
        'idioma' => $faker->randomElement(['es', 'en']),
        'cuentacontable' => random_int(410000, 410100),
        'marta' => '50',
        'susana' => '50',
    ];
});
