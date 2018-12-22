<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TipoEmpresasSeeder::class);
        $this->call(BanksSeeder::class);
        $this->call(ProvinciasSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(FormaPagosSeeder::class);
        $this->call(PeriodoPagosSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(EmpresasSeeder::class);
    }
}
