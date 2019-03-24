<?php

namespace Tests\Unit;

use App \{
    User,
    Empresa
};

use Tests\TestCase;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmpresaPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // function admins_can_update_empresas()
    // {
    //     $empresa = factory(Empresa::class)->create();
    //     $admin = $this->createAdmin();
    //     $this->be($admin);

    //     $result = Gate::allows('update-empresa', $empresa);

    //     $this->assertTrue($result);
    // }

    /** @test */
    // function unauthorized_users_cannot_update_empresas()
    // {
    //     $empresa = factory(Empresa::class)->create();
    //     $user = $this->createUser();

    //     $result = Gate::forUser($user)->allows('update-empresa', $empresa);

    //     $this->assertFalse($result);
    // }

    /** @test */
    // function guests_cannot_update_empresas()
    // {
    //     $empresa = factory(Empresa::class)->create();
    //     $result = Gate::allows('update-empresa', $empresa);

    //     $this->assertFalse($result);
    //     //el resultado es correcto porque Laravel por defecto no permite el acceso a usuarios no logados
    // }

    /** @test */
    // function admins_can_delete_empresa()
    // {
    //     $empresa = factory(Empresa::class)->create();
    //     $admin = $this->createAdmin();
    //     $this->be($admin);

    //     $result = Gate::allows('delete-empresa', $empresa);

    //     $this->assertTrue($result);
    // }
    
    /** @test */
    // function users_cannpt_delete_empresa()
    // {
    //     $empresa = factory(Empresa::class)->create();
    //     $user = $this->createUser();

    //     $result = Gate::forUser($user)->allows('delete-empresa', $empresa);

    //     $this->assertFalse($result);
    // }

    // public function createAdmin()
    // {
    //     return factory(User::class)->states('admin')->create();
    // }

    // public function createUser()
    // {
    //     return factory(User::class)->create(['role' => 'externo']);
    // }
}
