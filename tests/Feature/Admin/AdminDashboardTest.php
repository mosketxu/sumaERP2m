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

        $admin = factory(User::class)->create([
            'role' => 'admin'
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

        $user = factory(User::class)->create([
            'role' => 'suma'
        ]);

        $this->actingAs($user)
            ->get(route('admin_dashboard'))
            ->assertStatus(403);     //ruta prohibida
    }

    /** @test */
    function guests_cannot_visit_the_admin_dashboard()
    {
        $this->get(route('admin_dashboard'))
            ->assertStatus(302)     //redireccion temporal a login
            ->assertRedirect('login');
    }
}
