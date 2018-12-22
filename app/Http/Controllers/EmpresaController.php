<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use Illuminate\Support\Facades\Validator;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::with([
            'tipoempresa',
            'bancos' => function ($q) {
                $q->join('banks', 'banks.id', '=', 'bancos.bank_id')
                    ->where('principal', '=', '1');
            },
            'condFacturacions' => function ($q) {
                $q->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id')
                    ->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id');
            }
        ])->get();

        // if (auth()->user()->role_id == '1') {
        return view('partials.erp.admin', compact('empresas'));
        // } elseif (auth()->user()->role_id == '2') {
            // return view('partials.erp.suma', compact('empresas'));
        // }
        // return view('partials.erp.cliente', compact('empresas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresas::all();
        return view('partials.erp.cliente', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return redirect('erp/empresas')->with('message', 'Guardado Satisfactoriamente !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
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

        return view('partials.erp.empresa', compact('empresa'));
        // return view('partials.erp.empresa');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
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
}
