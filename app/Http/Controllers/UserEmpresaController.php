<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\{UserEmpresa,Empresa};

class UserEmpresaController extends Controller
{

    public function empAsoc($userid)
    {
        $empAsoc=DB::table('user_empresas')
            ->join('empresas', 'empresas.id', '=', 'user_empresas.empresa_id')
            ->select('user_empresas.id as idUserEmp','empresa_id as idEmp','user_id as idUser','empresas.name as empresa')
            ->where('user_id',$userid)
            ->orderBy('empresas.name')
            ->get();

        return response()->json(
            $empAsoc->toArray()
        );
    }

    public function empDisp($userid)
    {
        $empDisp=DB::table('empresas')
            ->select('name as empresa','id as idEmp')
            ->whereNotIn('id', function ($query) use ($userid) {
                $query->select('empresa_id')->from('user_empresas')->where('user_id', '=', $userid);
            })
            ->orderBy('name')
            ->get();

        return response()->json(
            $empDisp->toArray()
        );
    }

    public function store(Request $request,$userId,$empresaId)
    {
        if ($request->ajax()) {
            
            $userEmpresa=DB::table('user_empresas')->insertGetId([
                'empresa_id' => $empresaId,
                'user_id' => $userId]
            );
            $empresa=DB::table('empresas')
                 ->where('id',$empresaId)
                 ->first();

            $nam=$empresa->name;

            return response()->json([
                'idUserEmp'=>$userEmpresa,
                'nam'=>$nam,
            ]);
        }
    }

    // public function destroy($userId,$idUserEmp)
    public function destroy(Request $request,$userId,$idUserEmp,$idEmp)
    {
        if ($request->ajax()) {
            $empresa=UserEmpresa::findOrFail($idUserEmp);
            // $emp=Empresa::find($idEmp);
            $emp=  DB::table('empresas')->where('id',$idEmp)->first();
            $empresa->delete();

            return response()->json([
                'idEmp'=>$idEmp,
                'idUser'=>$userId,
                'nam'=>$emp->name,
                'idUserEmp'=>$idUserEmp,
                ]
            ); 
        }
    }
}
