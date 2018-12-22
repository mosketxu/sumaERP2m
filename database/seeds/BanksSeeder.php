<?php

use Illuminate\Database\Seeder;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Bank::class, 1)->create(['bank' => 'B.Sabadell']);
        factory(\App\Bank::class, 1)->create(['bank' => 'BBVA']);
        factory(\App\Bank::class, 1)->create(['bank' => 'LaCaixa']);
        factory(\App\Bank::class, 1)->create(['bank' => 'B.Santander']);
        factory(\App\Bank::class, 1)->create(['bank' => 'Bankinter']);
    }
}
