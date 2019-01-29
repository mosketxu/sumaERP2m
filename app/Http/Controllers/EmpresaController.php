<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $empresas = DB::table('empresas')
            ->join('bancos', 'empresas.id', '=', 'bancos.empresa_id')
            ->join('banks', 'banks.id', '=', 'bancos.bank_id')
            ->join('condicion_facturacions', 'empresas.id', '=', 'condicion_facturacions.empresa_id')
            ->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id')
            ->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id')
            ->join('tipo_empresas', 'tipo_empresas.id', '=', 'empresas.tipoempresa_id')
            ->orderBy('empresas.name')
            ->paginate(25);

        if (auth()->user()->role_id == '1') {
            return view('partials.erp.empresas.empresas', compact('empresas', 'user'));
        } elseif (auth()->user()->role_id == '2') {
            return view('partials.erp.suma', compact('empresas', 'user'));
        }
        return view('partials.erp.cliente', compact('empresas', 'user'));
    }


    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $empresa = new Empresa();

        $empresa->name = $request->name;
        $empresa->direccion = $request->direccion;
        $empresa->codpostal = $request->codpostal;
        $empresa->localidad = $request->localidad;
        $empresa->provincia_id = $request->provincia_id;
        $empresa->pais_id = $request->pais_id;
        $empresa->cifnif = $request->cifnif;
        $empresa->tfno = $request->tfno;
        $empresa->email = $request->email;
        $empresa->web = $request->web;
        $empresa->idioma = $request->idioma;
        $empresa->cuentacontable = $request->cuentacontable;
        $empresa->marta = $request->marta;
        $empresa->susana = $request->susana;
        $empresa->observaciones = $request->observaciones;
        $empresa->estado = 1;

        $empresa->save();;

        // return redirect('erp/empresas')->with('message', 'Guardado Satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = Auth::user();
        $empresa = Empresa::with([
            'tipoempresa',
            'bancos' => function ($q) {
                $q->join('banks', 'banks.id', '=', 'bancos.bank_id')
                    ->where('principal', '=', '1');
            },
            'condFacturacions' => function ($q) {
                $q->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id')
                    ->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id');
            }
        ])->whereSlug($slug)->first();
        return view('partials.erp.empresas.empresa', compact('empresa', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $empresa = Empresa::findOrFail($request->id);

        $empresa->name = $request->name;
        $empresa->direccion = $request->direccion;
        $empresa->codpostal = $request->codpostal;
        $empresa->localidad = $request->localidad;
        $empresa->provincia_id = $request->provincia_id;
        $empresa->pais_id = $request->pais_id;
        $empresa->cifnif = $request->cifnif;
        $empresa->tfno = $request->tfno;
        $empresa->email = $request->email;
        $empresa->web = $request->web;
        $empresa->idioma = $request->idioma;
        $empresa->cuentacontable = $request->cuentacontable;
        $empresa->marta = $request->marta;
        $empresa->susana = $request->susana;
        $empresa->observaciones = $request->observaciones;
        $empresa->estado = $request->estado;

        $empresa->save();;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Empresa::findOrFail($slug)->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $empresas = DB::table('empresas')
                ->join('bancos', 'empresas.id', '=', 'bancos.empresa_id')
                ->join('banks', 'banks.id', '=', 'bancos.bank_id')
                ->join('condicion_facturacions', 'empresas.id', '=', 'condicion_facturacions.empresa_id')
                ->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id')
                ->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id')
                ->join('tipo_empresas', 'tipo_empresas.id', '=', 'empresas.tipoempresa_id')
                ->where('empresas.name', 'LIKE', '%' . $request->search . "%")
                ->orWhere('bancos.iban', 'LIKE', '%' . $request->search . "%")
                ->orWhere('empresas.cifnif', 'LIKE', '%' . $request->search . "%")
                ->get();
            $total_row = $empresas->count();

            if ($empresas) {
                foreach ($empresas as $key => $empresa) {
                    if ($empresa->estado == 1) {
                        $est = '<i class="fa fa-check "></i>';
                    } else {
                        $est = '<i class="far fa-times-circle text-danger"></i>';
                    }
                    $output .=
                        '<tr>' .
                        '<td>' . $empresa->name . '</td>' .
                        '<td>' . $empresa->tipempr3 . '</td>' .
                        '<td>' . $empresa->cifnif . '</td>' .
                        '<td>' . $empresa->cuentacontable . '</td> ' .
                        '<td>' . substr($empresa->bank, 0, 5) . '</td>' .
                        '<td>' . $empresa->iban . '</td>' .
                        '<td>' . substr($empresa->periodopago, 0, 5) . '</td>' .
                        '<td>' . substr($empresa->formapago, 0, 5) . '</td>' .
                        '<td>' . $empresa->diavencimiento . '</td>' .
                        '<td>' . $est . '</td>' .
                        '<td>' .
                        '<a href=' . route("empresas.show", $empresa->slug) . '><i class="far fa-eye text-success"></i></a>' .
                        '<a href=' . route("empresas.edit", $empresa->slug) . '><i class="far fa-edit text-primary"></i></a>' .
                        '<a href=' . route("empresas.destroy", $empresa->slug) . '><i class="far fa-trash-alt text-danger"></i></a>' .
                        '</td>' .
                        '</tr>';
                }
            } else {
                $output .=
                    '<tr>' .
                    '<td colspam="10">No hay datos</td>' .
                    '</tr>';
            }
            return Response($output);
        }
    }

}
