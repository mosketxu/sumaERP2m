<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if ($request->busca) {
            $busqueda = $request->busca;
        } else {
            $busqueda = '';
        }

        $empresas = Empresa::search($request->busca)
            ->with([
                'tipoempresa', 'provincia', 'pais',
                'condFacturacions' => function ($q) {
                    $q->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id')
                        ->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id');
                },
                'bancos' => function ($q) {
                    $q->join('banks', 'banks.id', '=', 'bancos.bank_id')
                        ->where('principal', '=', '1');
                },
            ])
            ->orderBy('name', 'asc')
            ->paginate(10);
        return view('erp.admin.dashboard', compact('empresas', 'busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
