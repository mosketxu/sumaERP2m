<?php

namespace Tests;

Use App\User;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\TipoEmpresa;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createEmpresaConds(Type $var = null)
    {
        factory(\App\Provincia::class, 1)->create(['id' => '01', 'name' => 'ALABA']);
        factory(\App\TipoEmpresa::class, 1)->create(['tipempr3' => 'Cli', 'tipoempresa' => 'cliente']);
        factory(\App\TipoEmpresa::class, 1)->create(['tipempr3' => 'Pro', 'tipoempresa' => 'proveedor']);
        factory(\App\TipoEmpresa::class, 1)->create(['tipempr3' => 'C_P', 'tipoempresa' => 'clienteprovedor']);
        factory(\App\TipoEmpresa::class, 1)->create(['tipempr3' => 'Int', 'tipoempresa' => 'interno']);
        factory(\App\TipoEmpresa::class, 1)->create(['tipempr3' => 'Res', 'tipoempresa' => 'otros']);
        factory(\App\Pais::class, 1)->create(['id'=>'ES','name'=>'ESPAÑA','c3' => 'ESP']);
        factory(\App\Role::class, 1)->create(['role' => 'admin', 'descripcion' => 'administrador']);
        factory(\App\Role::class, 1)->create(['role' => 'suma', 'descripcion' => 'miembro de suma']);
        factory(\App\Role::class, 1)->create(['role' => 'externo', 'descripcion' => 'externo']);
    }

    
    public function createAdmin()
    {
        return factory(User::class)->create(['role_id'=>1]);
    }
    public function createSuma()
    {
        return factory(User::class)->create(['role_id' => 2]);
    }

    public function createUser()
    {
        return factory(User::class)->create(['role_id' => 3]);
    }
}
