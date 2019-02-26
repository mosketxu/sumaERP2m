<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App \{
    Empresa,
    UserEmpresa
};

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Método principal: Muestro todas las empresas y las operaciones que puedo hacer con ellas
    public function index(Request $request)
    {
        if ($request->busca) {
            $busqueda = $request->busca;
        } else {
            $busqueda = '';
        }

        // if (auth()->user()->role_id == '1') {

        $user = auth()->user()->id;
        $rol = auth()->user()->role_id;

        if (auth()->user()->role_id == '1') {
            $empresas = Empresa::search($request->busca)
                ->with([
                    'tipoempresa',
                    'bancos' => function ($q) {
                        $q->join('banks', 'banks.id', '=', 'bancos.bank_id')
                            ->where('principal', '=', '1');
                    },
                    'condFacturacions' => function ($q) {
                        $q->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id')
                            ->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id');
                    },
                ])
                ->orderBy('name', 'asc')
                ->paginate(10);
            return view('erp.empresas.admin', compact('empresas', 'busqueda'));
        } else {
            $empresas = Empresa::whereHas('userempresa', function ($query) use ($user) {
                $query->where('user_id', $user);
            })
                ->with([
                    'tipoempresa',
                    'bancos' => function ($q) {
                        $q->join('banks', 'banks.id', '=', 'bancos.bank_id')
                            ->where('principal', '=', '1');
                    },
                    'condFacturacions' => function ($q) {
                        $q->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id')
                            ->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id');
                    },
                ])
                ->orderBy('name', 'asc')
                ->paginate(10);
            return view('erp.empresas.index', compact('empresas', 'busqueda'));
        }
    }

    // Llamo al formulario donde voy a crear el registro
    public function create()
    {
        $empresas = Empresa::all();
        return view('erp.empresas.create', compact('empresas'));
    }

    // Metodo donde recibo los datos del formulario Create y los guardo en la BBDD

    public function store(Request $request)
    {
        // if (!$request->ajax()) return redirect('/');

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

    // Con este método llamo al formulario donde voy a MOSTRAR el registro
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
        return view('erp.empresas.show', compact('empresa'));
    }

    // Con este método llamo al formulario donde voy a editar el registro
    public function edit($slug)
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

        return view('erp.empresas.edit', compact('empresa'));
    }

    // Recupero los datos EDITADOS y los actualizo
    public function update(Request $request)
    {
        // if (!$request->ajax()) return redirect('/');
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

        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('erp.empresas');
    }

    // Elimino el registro
    public function destroy($id)
    {
        $user = Auth::user();
        $empresa = Empresa::findorFail($id);
        if ($user->can('delete', $empresa)) {
            Empresa::findOrFail($id)->delete();
            return redirect()->route('empresas.index')->with('status', 'Empresa ' . $empresa->name . ' eliminada!');;
        } else {
            echo 'Not Authorized.';
        }
    }
}
