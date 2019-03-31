<?php

namespace Tests\Feature;

use App \{
    User,
    Role
};
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    function it_shows_the_dashboard_page_to_authenticated_users()
    {
        factory(\App\Role::class, 1)->create(['role' => 'admin', 'descripcion' => 'administrador']);
        factory(\App\Role::class, 1)->create(['role' => 'suma', 'descripcion' => 'miembro de suma']);
        factory(\App\Role::class, 1)->create(['role' => 'externo', 'descripcion' => 'externo']);

        $user = factory(User::class)->create([
            'role_id' => 3
        ]);

        $this->actingAs($user)
            ->get(route('erp.index'))
            ->assertStatus(200)
            ->assertSee('Dashboard');
    }
    /** @test */
    function it_redirects_notlogged_users_to_the_login_page()
    {
        $this->get(route('erp.index'))
            ->assertRedirect('login')
            ->assertStatus(302);
        $this->get(route('empresas.index'))
            ->assertStatus(302)
            ->assertRedirect('login');
        $this->get(route('user.index'))
            ->assertStatus(302)
            ->assertRedirect('login');
        $this->get(route('user.profile'))
            ->assertStatus(302)
            ->assertRedirect('login');
        $this->get(route('user.updateavatar'))
            ->assertStatus(302)
            ->assertRedirect('login');
        $this->get(route('genero.index'))
            ->assertStatus(302)
            ->assertRedirect('login');
    }

    /** @test */
    function it_shows_the_home_page_to_guest_user()
    {
        $this->get(route('home'))
            ->assertStatus(200)
            ->assertSee('Contabilidad');
    }
}
