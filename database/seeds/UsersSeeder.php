<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(\App\User::class, 1)->create([
			'name' => 'admin',
			'lastname' => 'ape admin',
			'email' => 'admin@admin.com',
			'slug' => 'admin',
			'password' => bcrypt('1234'),
			'role_id' => \App\Role::ADMIN
			// 'role' => 'admin'
		]);

		factory(\App\User::class, 1)->create([
			'name' => 'alex',
			'lastname' => 'arre',
			'email' => 'alex@alex.com',
			'slug' => 'alex-1',
			'password' => bcrypt('1234'),
			'role_id' => \App\Role::SUMA
			// 'role' => 'suma'
		]);

		factory(\App\User::class, 1)->create([
			'name' => 'cliente 1',
			'lastname' => 'ape cliente 1',
			'email' => 'cliente1@cliente.com',
			'slug' => 'cliente-1',
			'password' => bcrypt('1234'),
			'role_id' => \App\Role::EXTERNO
			// 'role' => 'externo'
		]);
	}
}
