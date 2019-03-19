<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use SebastianBergmann\Comparator\Factory;

class UserPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function admins_can_update_posts()
    {
        // Arrange
        //creo un admin y lo asigno como activo
        $admin = $this->createAdmin();
        $this->be($admin);

        // Creo un usuario que querré actualizar. Le llamo $usuario para no confundir el $user que el Gate recibe por defecto y es el usuario activo
        $usuario = factory(User::class)->create();

        // Act
        $result = Gate::allows('update-user', $usuario);
        //$result = $admin->can('update-post', $post);
        //$result = auth()->user()->can('update-post', $post);

        // Assert
        $this->assertTrue($result);
    }

    public function createAdmin()
    {
        return factory(User::class)->states('admin')->create();
    }
}
