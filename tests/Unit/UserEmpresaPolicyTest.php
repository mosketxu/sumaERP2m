<?php

namespace Tests\Unit;

use App\{User, Empresa, UserEmpresa
};
use Illuminate\Support\Facades\Gate;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserEmpresaPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function los_admin_pueden_acceder_a_la_empresa()
    {
        $empresa = factory(Empresa::class)->create();
        $admin = $this->createAdmin();
        $this->be($admin); 
        $usuario=$this->createUser();

        $userEmpresa=factory(UserEmpresa::class)->create(['user_id'=>$usuario,'empresa_id'=>$empresa]);

        // $result = Gate::allows('view-userempresa', $userEmpresa);
        $result = Gate::allows('userempresa.view', $userEmpresa);

        $this->assertTrue($result);
    }

    /** @test */
    function los_usuarios_con_la_empresa_asociada_pueden_acceder_a_la_empresa()
    {
        $empresa = factory(Empresa::class)->create();
        $usuario = $this->createUser();
        $userEmpresa=factory(UserEmpresa::class)->create(['user_id'=>$usuario,'empresa_id'=>$empresa]);

        // $result = Gate::forUser($usuario)->allows('view-userempresa', $userEmpresa);
        $result = Gate::forUser($usuario)->allows('userempresa.view', $userEmpresa);

        $this->assertTrue($result);
    }

    /** @test */
    function los_usuarios_con_la_empresa_no_asociada_no_pueden_acceder_a_la_empresa()
    {
        $empresa = factory(Empresa::class)->create();
        $usuario = $this->createUser();
        $usuario2 = $this->createUser();
        $userEmpresa=factory(UserEmpresa::class)->create(['user_id'=>$usuario2,'empresa_id'=>$empresa]);

        // $result = Gate::forUser($usuario)->allows('view-userempresa', $userEmpresa);
        $result = Gate::forUser($usuario)->allows('userempresa.view', $userEmpresa);

        $this->assertFalse($result);
    }
}
