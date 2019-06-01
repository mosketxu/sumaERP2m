<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{Empresa,Contacto,Pu,Pais,Provincia, TipoEmpresa, Rules\MartaSusana};

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

        $user = auth()->user()->id;

        $empresas = Empresa::search($request->busca)
            ->whereHas('userempresa', function ($query) use ($user) {
                $query->where('user_id', $user);
            })
            ->with([
                'tipoempresa', 'provincia', 'pais',
                'condFacturacions' => function ($q) {
                    $q->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id')
                    ->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id');
                },
                'bancos' => function ($q) {
                    $q->join('banks', 'banks.id', '=', 'bancos.bank_id')
                        ->where('principal', '=', '1');
                },
            ])
            ->orderBy('name', 'asc')
            ->paginate(10);
        return view('erp.empresas.index', compact('empresas', 'busqueda'));
    }
    

    // Llamo al formulario donde voy a crear el registro
    public function create()
    {
        $empresas = Empresa::all();
        $paises=Pais::all();
        $provincias=Provincia::all();
        $tipos=TipoEmpresa::all();
        return view('erp.empresas.create', compact('empresas','paises','provincias','tipos'));
    }

    // Metodo donde recibo los datos del formulario Create y los guardo en la BBDD

    public function store(Request $request)
    {
        $rules= [
            'newempresaname' => 'required|unique:empresas,name',
            'newempresamarta'=>'required',
            'newempresasusana'=>'required',
            'newtotalmartasusana'=>new MartaSusana(), // ver en Rules\MartaSusana};
            // 'newuserpassword' => 'required|min:6|confirmed',
        ];
         
        $messages = [
            'newempresaname.required' => 'Debes poner el nombre de la empresa.',
            'newempresaname.unique' => 'Ya existe la empresa ' . $request->newempresaname,
            'newempresamarta.required'=>'Marta debe tener una valor',
            'newempresasusana.required'=>'Susana debe tener una valor',
        ];

        $this->validate($request,$rules,$messages);

        $empresa = new Empresa();

        $empresa->name = $request->newempresaname;
        $empresa->cifnif = $request->newempresanif;
        $empresa->tipoempresa_id = $request->newempresatipo;
        $empresa->direccion = $request->newempresadireccion;
        $empresa->codpostal = $request->newempresacp;
        $empresa->localidad = $request->newempresalocalidad;
        $empresa->provincia_id = $request->newempresaprovincia;
        $empresa->pais_id = $request->newempresapais;
        $empresa->tfno = $request->newempresatfno;
        $empresa->email = $request->newempresaemail;
        $empresa->web = $request->newempresaweb;
        $empresa->idioma = $request->newempresaidioma;
        $empresa->cuentacontable = $request->newempresacuentacontable;
        $empresa->marta = $request->newempresamarta;
        $empresa->susana = $request->newempresasusana;
        $empresa->observaciones = $request->newempresaobservaciones;
        $empresa->estado = 1;

        $empresa->save();;

        return redirect('erp/empresas')->with('message', 'Guardado Satisfactoriamente !');
    }

    // Con este método llamo al formulario donde voy a MOSTRAR el registro
    public function show($slug)
    {
        $empresa = Empresa::whereSlug($slug)
            ->with([
                'contactos',
                'tipoempresa',
                'provincia',
                'pais',
                'bancos' => function ($q) {
                    $q->join('banks', 'banks.id', '=', 'bancos.bank_id');
                },
                'condFacturacions' => function ($q) {
                    $q->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id')
                        ->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id');
                }
            ])->first();

        $contactos= Contacto::where('empresa_id',$empresa->id)->get();
        $pus=Pu::where('empresa_id',$empresa->id)->get();
        return view('erp.empresas.show', compact('empresa','contactos','pus'));
    }

    // Con este método llamo al formulario donde voy a editar el registro
    public function edit($slug)
    {
        dd('no listo');
        $empresa = Empresa::whereSlug($slug)
            ->with([
                'tipoempresa',
                'bancos' => function ($q) {
                    $q->join('banks', 'banks.id', '=', 'bancos.bank_id')
                        ->where('principal', '=', '1');
                },
                'condFacturacions' => function ($q) {
                    $q->join('forma_pagos', 'forma_pagos.id', '=', 'condicion_facturacions.formapago_id')
                        ->join('periodo_pagos', 'periodo_pagos.id', '=', 'condicion_facturacions.periodopago_id');
                }
            ])->first();

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
