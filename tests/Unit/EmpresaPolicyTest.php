<?php

namespace Tests\Unit;

use App \{
    User,
    Empresa
};

use Tests\TestCase;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmpresaPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function admins_can_update_empresas()
    {
        // Arrange

        $empresa = factory(Empresa::class)->create();

        $admin = $this->createAdmin();
        $this->be($admin);

        // Act
        $result = Gate::allows('update-empresa', $empresa);

        // Assert
        $this->assertTrue($result);
    }

    /** @test */
    function unauthorized_users_cannot_update_empresas()
    {
        // Arrange
        $empresa = factory(Empresa::class)->create();

        //creo un usuario no admin  y lo asigno como activo con foruser
        $user = $this->createUser();

        // Act
        $result = Gate::forUser($user)->allows('update-empresa', $empresa);

        // Assert
        $this->assertFalse($result);
    }

    /** @test */
    function guests_cannot_update_empresas()
    {
        // Arrange
        // no hay usuario activo

        $empresa = factory(Empresa::class)->create();

        // Act
        $result = Gate::allows('update-empresa', $empresa);

        // Assert
        $this->assertFalse($result);
        //el resultado es correcto porque Laravel por defecto no permite el acceso a usuarios no logados
    }

    /** @test */
    function admins_can_delete_empresa()
    {
        $empresa = factory(Empresa::class)->create();

        $admin = $this->createAdmin();
        $this->be($admin);

        // Act
        $result = Gate::allows('delete-empresa', $empresa);

        // Assert
        $this->assertTrue($result);
    }
    
    /** @test */
    function users_cannpt_delete_empresa()
    {
        $empresa = factory(Empresa::class)->create();

        $user = $this->createUser();

        $result = Gate::forUser($user)->allows('delete-empresa', $empresa);

        $this->assertFalse($result);
    }

    public function createAdmin()
    {
        return factory(User::class)->states('admin')->create();
    }

    public function createUser()
    {
        return factory(User::class)->create(['role' => 'externo']);
    }
}
