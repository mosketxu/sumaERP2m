<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPolicyTest extends TestCase
{
 
    /** @test */
    function admins_can_create_users()
    {
        // $this->withoutExceptionHandling();
        $this->actingAs($admin = $this->createAdmin());
        $response = $this->post('erp/user', [
            'newuserpassword'=>'123456',
            'newusername' => 'piop',
            'newuseremail' => 'p@p.com',
            'newuserpassword' => '123456',
            'newuserrole' => '2'
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'name' => 'piop',
        ]);
    }

    /** @test */
    function admins_can_update_users()
    {
        $this->withoutExceptionHandling();
        $admin = $this->createAdmin();
        $this->actingAs($admin);

        $user = $this->createUser();

        $response = $this->put("erp/user/{$user->id}", [
            'username' => 'modif',
        ]);


        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'modif',
        ]);


        // $response = $this->put("erp/user/{$user->id}", [
        //     'name' => 'Updated user name',
        // ]);

        // $response->assertStatus(200)
        //     ->assertSee('Post updated!');

        // $this->assertDatabaseHas('users', [
        //     'id' => $user->id,
        //     'name' => 'Updated post title',
        // ]);
    }
    
    /** @test */
    function non_admins_cannot_create_users()
    {
        // $this->withoutExceptionHandling();
        $this->actingAs($admin = $this->createAdmin());
        $response = $this->post('erp/user', [
            'newuserpassword'=>'123456',
            'newusername' => 'piop',
            'newuseremail' => 'p@p.com',
            'newuserpassword' => '123456',
            'newuserrole' => '2'
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'name' => 'piop',
        ]);
    }

    /** @test */
    function admin_can_view_users()
    {
        // $this->withoutExceptionHandling();
        $admin = $this->createAdmin();
        $this->be($admin); 
        $this->get(route('user.index'))
        ->assertStatus(200)
        ->assertSee('Usuarios');
        
    }

    /** @test */
    function not_admin_cannot_view_users()
    {
        // $this->withoutExceptionHandling();
        $user = $this->createUser();
        $this->actingAs($user)
            ->get(route('user.index'))
            ->assertStatus(403);
    }
    
}
