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
    function admins_can_update_users()
    {
        // Arrange

        // Creo un usuario que querré actualizar. Le llamo $usuario para no confundir el $user que el Gate recibe por defecto y es el usuario activo
        $usuario = factory(User::class)->create();

        //creo un admin y lo asigno como activo
        $admin = $this->createAdmin();
        $this->be($admin); //si quito esta linea en el Gate usare foruser

        // Act
        $result = Gate::allows('update-user', $usuario);
        // $result = Gate::forUser($admin)->allows('update-user', $usuario);
        // $result = $admin->can('update-user', $usuario);
        // $result = $admin->cannot('update-user', $usuario);
        $result = auth()->user()->can('update-user', $usuario);


        // Assert
        $this->assertTrue($result);
    }

    /** @test */
    function unauthorized_users_cannot_update_users()
    {
        // Arrange
        // Creo un usuario que querré actualizar. Le llamo $usuario para no confundir el $user que el Gate recibe por defecto y es el usuario activo
        $usuario = factory(User::class)->create();

        //creo un usuario no admin  y lo asigno como activo con foruser
        $user = $this->createUser();

        // Act
        $result = Gate::forUser($user)->allows('update-user', $usuario);

        // Assert
        $this->assertFalse($result);
    }

    /** @test */
    function guests_cannot_update_users()
    {
        // Arrange
        // no hay usuario activo
        // Creo un usuario que querré actualizar. Le llamo $usuario para no confundir el $user que el Gate recibe por defecto y es el usuario activo
        $usuario = factory(User::class)->create();

        // Act
        $result = Gate::allows('update-user', $usuario);

        // Assert
        $this->assertFalse($result);
        //el resultado es correcto porque Laravel por defecto no permite el acceso a usuarios no logados
    }

}
