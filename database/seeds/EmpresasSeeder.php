<?php

use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Empresa::class, 50)->create()
        ->each(function (\App\Empresa $b) {
        	factory(\App\Banco::class, 1)->create(['empresa_id' => $b->id]);
        	factory(\App\Contacto::class, 2)->create(['empresa_id' => $b->id]);
        	factory(\App\CondicionFacturacion::class, 1)->create(['empresa_id' => $b->id]);
        	factory(\App\Pu::class, 3)->create(['empresa_id' => $b->id]);
        });
    }
}
