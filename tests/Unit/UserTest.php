<?php

namespace Tests\Unit;

use App \User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_can_be_an_admin()
    {
        $user = factory(User::class)->create([
            'role_id' => 2
        ]);
        // $this->assertFalse($user->admin);
        $this->assertFalse($user->isAdmin());

        $user->role_id = 1;
        $user->save();

        // $this->assertTrue($user->admin);
        $this->assertTrue($user->isAdmin());
    }

    /** @test */
    function a_user_cannot_be_an_admin()
    {
        // $this->markTestIncomplete();
        $user = factory(User::class)->create([
            'role_id' => 3
        ]);

        $user->refresh();

        $this->assertFalse($user->isAdmin());
    }
}
