<?php

namespace Tests\Unit;

use App\{User, Empresa, UserEmpresa
};
use Illuminate\Support\Facades\Gate;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserEmpresaPolicyTest extends TestCase
{
    use RefreshDatabase;

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
    function los_admin_pueden_acceder_a_la_empresa()
    {
        $this->createEmpresaConds();
        $empresa = factory(Empresa::class)->create();
        $admin = $this->createAdmin();
        $this->be($admin); 
        $usuario=$this->createUser();

        $userEmpresa=factory(UserEmpresa::class)->create(['user_id'=>$usuario,'empresa_id'=>$empresa]);

        // $result = Gate::allows('view-userempresa', $userEmpresa);
        // $result = Gate::allows('userempresa.view', $userEmpresa);
        $result = Gate::allows('view', $userEmpresa);

        $this->assertTrue($result);
    }

    /** @test */
    function los_usuarios_con_la_empresa_asociada_pueden_acceder_a_la_empresa()
    {
        $this->createEmpresaConds();
        $empresa = factory(Empresa::class)->create();
        $usuario = $this->createUser();
        $userEmpresa=factory(UserEmpresa::class)->create(['user_id'=>$usuario,'empresa_id'=>$empresa]);

        // $result = Gate::forUser($usuario)->allows('view-userempresa', $userEmpresa);
        // $result = Gate::forUser($usuario)->allows('userempresa.view', $userEmpresa);
        $result = Gate::forUser($usuario)->allows('view', $userEmpresa);

        $this->assertTrue($result);
    }

    /** @test */
    function los_usuarios_con_la_empresa_no_asociada_no_pueden_acceder_a_la_empresa()
    {
        $this->createEmpresaConds();
        $empresa = factory(Empresa::class)->create();
        $usuario = $this->createUser();
        $usuario2 = $this->createUser();
        $userEmpresa=factory(UserEmpresa::class)->create(['user_id'=>$usuario2,'empresa_id'=>$empresa]);

        // $result = Gate::forUser($usuario)->allows('view-userempresa', $userEmpresa);
        // $result = Gate::forUser($usuario)->allows('userempresa.view', $userEmpresa);
        $result = Gate::forUser($usuario)->allows('view', $userEmpresa);

        $this->assertFalse($result);
    }
}
