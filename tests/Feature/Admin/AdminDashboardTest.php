<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    function admins_can_visit_the_admin_dashboard()
    {
        // $this->markTestIncomplete('incompleto con mensaje');
        factory(\App\Role::class, 1)->create(['role' => 'admin', 'descripcion' => 'administrador']);
        factory(\App\Role::class, 1)->create(['role' => 'suma', 'descripcion' => 'miembro de suma']);
        factory(\App\Role::class, 1)->create(['role' => 'externo', 'descripcion' => 'externo']);

        $admin = factory(User::class)->create([
            'role_id' => '1'
        ]);

        // $this->withoutExceptionHandling();

        $this->actingAs($admin)
            ->get(route('admin_dashboard'))
            ->assertStatus(200)
            ->assertSee('Admin Panel');
    }

    /** @test */
    function non_admin_users_cannot_visit_the_admin_dashboard()
    {
        // $this->markTestIncomplete('incompleto con mensaje');
        // $this->withoutExceptionHandling();

        factory(\App\Role::class, 1)->create(['role' => 'suma', 'descripcion' => 'miembro de suma']);

        $user = factory(User::class)->create([
            'role_id' => 2
        ]);

        $this->actingAs($user)
            ->get(route('admin_dashboard'))
            ->assertStatus(403);     //ruta prohibida
    }

    /** @test */
    function guests_cannot_visit_the_admin_dashboard()
    {
        factory(\App\Role::class, 1)->create(['role' => 'admin', 'descripcion' => 'administrador']);
        factory(\App\Role::class, 1)->create(['role' => 'suma', 'descripcion' => 'miembro de suma']);
        factory(\App\Role::class, 1)->create(['role' => 'externo', 'descripcion' => 'externo']);

        $this->get(route('admin_dashboard'))
            ->assertStatus(302)     //redireccion temporal a login
            ->assertRedirect('login');
    }
}
