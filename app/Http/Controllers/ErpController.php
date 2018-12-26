<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Empresa;
use function GuzzleHttp\json_encode;


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
        ->paginate(25);
        return view('partials.erp.dashboard', compact('empresas'));
    }

    public function search(Request $request){
        if($request->ajax()){
            $output="";
            $empresas = DB::table('empresas')
                ->join('bancos', 'empresas.id', '=', 'bancos.empresa_id')
                ->join('banks', 'banks.id', '=', 'bancos.bank_id')
                ->join('condicion_facturacions', 'empresas.id', '=', 'condicion_facturacions.empresa_id')
                ->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id')
                ->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id')
                ->join('tipo_empresas', 'tipo_empresas.id', '=', 'empresas.tipoempresa_id')
                ->where('empresas.name','LIKE','%'.$request->search."%")
                ->orWhere('bancos.iban','LIKE','%'.$request->search."%")
                ->orWhere('empresas.cifnif','LIKE','%'.$request->search."%")
                ->get();
            $total_row=$empresas->count();

            if($empresas){
                foreach ($empresas as $key => $empresa) {
                    $output.=
                        '<tr>'.
                            '<td>'.$empresa->name.'</td>'.
                            '<td>'.$empresa->tipempr3.'</td>'.
                            '<td>'.$empresa->cifnif.'</td>'.
                            '<td>'.$empresa->cuentacontable.'</td> '.
                            '<td>'.$empresa->bank.'</td>'.
                            '<td>'.$empresa->iban.'</td>'.
                            '<td>'.$empresa->periodopago.'</td>'.
                            '<td>'.$empresa->formapago.'</td>'.
                            '<td>'.$empresa->diavencimiento.'</td>'.
                            '<td>'.$empresa->estado.'</td>'.
                        '</tr>';
                }
            }
            else{
                dd('kk');
                $output.=
                '<tr>'.
                    '<td colspam="10">No hay datos</td>'.
                '</tr>';
            }
            return Response($output);
        }
    }
}