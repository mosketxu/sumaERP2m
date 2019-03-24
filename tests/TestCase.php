<?php

namespace Tests;

Use App\User;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\TipoEmpresa;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createAdmin()
    {
        return factory(User::class)->states('admin')->create();
    }

    public function createUser()
    {
        return factory(User::class)->create(['role' => 'externo']);
    }
}
