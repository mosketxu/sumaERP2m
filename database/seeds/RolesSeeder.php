<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Role::class, 1)->create(['rol' => 'admin', 'descripcion' => 'administrador']);
        factory(\App\Role::class, 1)->create(['rol' => 'suma', 'descripcion' => 'miembro de suma']);
        factory(\App\Role::class, 1)->create(['rol' => 'externo', 'descripcion' => 'externo']);
    }
}