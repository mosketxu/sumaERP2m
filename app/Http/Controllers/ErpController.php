<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Empresa;


class ErpController extends Controller
{
    public function index()
    {
        $empresas = DB::table('empresas')
        ->join('bancos', 'empresas.id', '=', 'bancos.empresa_id')
        ->join('banks', 'banks.id', '=', 'bancos.bank_id')
        ->join('condicion_facturacions', 'empresas.id', '=', 'condicion_facturacions.empresa_id')
        ->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id')
        ->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id')
        ->join('tipo_empresas', 'tipo_empresas.id', '=', 'empresas.tipoempresa_id')
        ->orderBy('empresas.name')
        ->paginate(15);
        return view('partials.erp.dashboard', compact('empresas'));
    }
}
