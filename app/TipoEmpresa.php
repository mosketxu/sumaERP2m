<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEmpresa extends Model
{
    // protected $table = 'tipo_empresas';

    const CLIENTE=1;
    const PROVEEDOR=2;
    const CLIENTEPROVEEDOR= 3;
    const INTERNO= 4;
    const OTROS= 5;
}
