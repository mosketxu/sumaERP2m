<?php

use Illuminate\Database\Seeder;

class TipoEmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\TipoEmpresa::class, 1)->create(['tipempr3' => 'Cli', 'tipoempresa' => 'cliente']);
        factory(\App\TipoEmpresa::class, 1)->create(['tipempr3' => 'Pro', 'tipoempresa' => 'proveedor']);
        factory(\App\TipoEmpresa::class, 1)->create(['tipempr3' => 'C_P', 'tipoempresa' => 'clienteprovedor']);
        factory(\App\TipoEmpresa::class, 1)->create(['tipempr3' => 'Int', 'tipoempresa' => 'interno']);
        factory(\App\TipoEmpresa::class, 1)->create(['tipempr3' => 'Res', 'tipoempresa' => 'otros']);
    }
}
