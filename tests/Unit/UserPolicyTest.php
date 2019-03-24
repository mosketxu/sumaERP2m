<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // function admins_can_update_users()
    // {
    //     $usuario = factory(User::class)->create();
    //     $admin = $this->createAdmin();
    //     $this->be($admin);

    //     $result = Gate::allows('update-user', $usuario);
    //     // $result = Gate::forUser($admin)->allows('update-user', $usuario);
    //     // $result = $admin->can('update-user', $usuario);
    //     // $result = $admin->cannot('update-user', $usuario);
    //     // $result = auth()->user()->can('update-user', $usuario);

    //     $this->assertTrue($result);
    // }

    /** @test */
    // function unauthorized_users_cannot_update_users()
    // {
    //     $usuario = factory(User::class)->create();
    //     $user = $this->createUser();

    //     $result = Gate::forUser($user)->allows('update-user', $usuario);

    //     $this->assertFalse($result);
    // }

    /** @test */
    // function guests_cannot_update_users()
    // {
    //     $usuario = factory(User::class)->create();

    //     $result = Gate::allows('update-user', $usuario);

    //     $this->assertFalse($result);
    //     //el resultado es correcto porque Laravel por defecto no permite el acceso a usuarios no logados
    // }

}
