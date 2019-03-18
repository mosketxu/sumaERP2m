<?php

namespace Tests\Feature\Admin;

use App\{User,Role};
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HideAdminRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_does_not_allow_guests_to_discover_admin_urls()
    {
        // $this->markTestIncomplete();
        $this->get('erp/admin/invalid-url')
            ->assertStatus(302)
            ->assertRedirect('login');
    }

    /** @test */
    function it_does_not_allow_guests_to_discover_admin_urls_using_post()
    {
        // $this->markTestIncomplete();
        $this->post('admin/invalid-url')
            ->assertStatus(404);
            // ->assertRedirect('login');
    }
    
    /** @test */
    function it_displays_404s_when_admins_visit_invalid_urls()
    {
        // $this->markTestIncomplete();
        factory(Role::class)->create([
            'rol' => 'admin'
        ]);
        $admin = factory(User::class)->create([
            'role_id'=>'1'
        ]);
        $this->actingAs($admin)
            ->get('erp/admin/invalid-url')
            ->assertStatus(404);
    }
}
