<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactoPolicyTest extends TestCase
{
    /** @test */
    function admins_can_create_contacts()
    {
        // $this->withoutExceptionHandling();
        $this->actingAs($admin = $this->createAdmin());
        $response = $this->post('erp/contact', [
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
}
