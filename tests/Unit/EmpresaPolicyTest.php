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
    function admins_can_create_empresas()
    {
        // $this->withoutExceptionHandling();

        $this->actingAs($admin = $this->createAdmin());

        $response = $this->post('erp/empresas/create', [
            'mame' => 'Emp',
            'slug'=>'emp-1',
            'alias'=>'eem',
            'tipoempresa_id'=>2,
            'dire'=>'sd',
            'cospostal'=>'09900',
            'localidas'=>'po',
            'provincia_id'=>'42',
            'pais_id'=>'ES'

        ]);

        $response->assertSee('Contact us');

        // $response->assertStatus(201)->assertSee('Post created');

        // $this->assertDatabaseHas('posts', [
        //     'title' => 'New post',
        // ]);
        // $this->createEmpresaConds();
        // $empresa = factory(Empresa::class)->create();
        // $admin = $this->createAdmin(); 
        // $this->be($admin);

        // $result = Gate::allows('update', $empresa);

        // $this->assertTrue($result);
    }

    /** @test */
    function admins_can_update_empresas()
    {
        $this->createEmpresaConds();
        $empresa = factory(Empresa::class)->create();
        $admin = $this->createAdmin(); 
        $this->be($admin);

        $result = Gate::allows('update', $empresa);

        $this->assertTrue($result);
    }

    /** @test */
    function unauthorized_users_cannot_update_empresas()
    {
        $this->createEmpresaConds();
        $empresa = factory(Empresa::class)->create();
        $user = $this->createUser();

        $result = Gate::forUser($user)->allows('update', $empresa);

        $this->assertFalse($result);
    }

    /** @test */
    function guests_cannot_update_empresas()
    {
        $this->createEmpresaConds();
        $empresa = factory(Empresa::class)->create();
        $result = Gate::allows('update-empresa', $empresa);

        $this->assertFalse($result);
        //el resultado es correcto porque Laravel por defecto no permite el acceso a usuarios no logados
    }

    /** @test */
    function admins_can_delete_empresa()
    {
        $this->createEmpresaConds();
        $empresa = factory(Empresa::class)->create();
        $admin = $this->createAdmin();
        $this->be($admin);

        $result = Gate::allows('delete-empresa', $empresa);

        $this->assertTrue($result);
    }
    
    /** @test */
    function users_cannpt_delete_empresa()
    {
        $this->createEmpresaConds();

        $empresa = factory(Empresa::class)->create();
        $user = $this->createUser();

        $result = Gate::forUser($user)->allows('delete-empresa', $empresa);

        $this->assertFalse($result);
    }
}
