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
			'email' => 'admin@admin.com',
			'slug' => 'admin',
			'password' => bcrypt('1234'),
			'role_id' => \App\Role::ADMIN
		]);

		factory(\App\User::class, 1)->create([
			'name' => 'alex',
			'email' => 'alex@alex.com',
			'slug' => 'alex',
			'password' => bcrypt('1234'),
			'role_id' => \App\Role::SUMA
		]);

		factory(\App\User::class, 1)->create([
			'name' => 'cliente 1',
			'email' => 'cliente1@cliente.com',
			'slug' => 'cliente-1',
			'password' => bcrypt('1234'),
			'role_id' => \App\Role::EXTERNO
		]);
	}
}
