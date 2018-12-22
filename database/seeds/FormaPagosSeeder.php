<?php

use Illuminate\Database\Seeder;

class FormaPagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forma_pagos')->delete();

        DB::table('forma_pagos')->insert([
            ['formapago' => 'Domiciliado'],
            ['formapago' => 'Transf. ES50 1234 5678 9101 1213'],
            ['formapago' => 'No definido'],
        ]);
    }
}
