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
        factory(\App\Role::class, 1)->create(['role' => 'admin', 'descripcion' => 'administrador']);
        factory(\App\Role::class, 1)->create(['role' => 'suma', 'descripcion' => 'miembro de suma']);
        factory(\App\Role::class, 1)->create(['role' => 'externo', 'descripcion' => 'externo']);
    }
}

