<?php

use Illuminate\Database\Seeder;


class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->delete();

        DB::table('provincias')->insert([
            ['name' => 'Albacete', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Ciudad Real', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Cuenca', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Guadalajara', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Toledo', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Huesca', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Teruel', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Zaragoza', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Ceuta', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Madrid', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Murcia', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Melilla', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Navarra', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Almería', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Cádiz', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Córdoba', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Granada', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Huelva', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Jaén', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Málaga', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Sevilla', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Asturias', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Cantabria', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Ávila', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Burgos', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'León', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Palencia', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Salamanca', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Segovia', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Soria', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Valladolid', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Zamora', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Barcelona', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Gerona', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Lérida', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Tarragona', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Badajoz', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Cáceres', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Coruña, La', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Lugo', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Orense', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Pontevedra', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Rioja, La', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Baleares, Islas', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Álava', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Guipúzcoa', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Vizcaya', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Palmas, Las', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Tenerife, Santa Cruz De', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Alicante', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Castellón', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Valencia', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        ]);
    }
}
