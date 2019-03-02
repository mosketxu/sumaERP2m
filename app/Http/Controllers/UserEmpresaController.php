<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App \{
    UserEmpresa,
    Empresa,
    User
};

use App\Http\Requests\UserEmpresaRequest;

use Illuminate\Support\Facades\Validator;
use Dotenv\Exception\ValidationException;


class UserEmpresaController extends Controller
{

    public function empAsoc($userid)
    {
        $empAsoc = DB::table('user_empresas')
            ->join('empresas', 'empresas.id', '=', 'user_empresas.empresa_id')
            ->select('user_empresas.id as idUserEmp', 'empresa_id as idEmp', 'user_id as idUser', 'empresas.name as empresa')
            ->where('user_id', $userid)
            ->orderBy('empresas.name')
            ->get();

        return response()->json(
            $empAsoc->toArray()
        );
    }

    public function empDisp($userid)
    {
        $empDisp = DB::table('empresas')
            ->select('name as empresa', 'id as idEmp')
            ->whereNotIn('id', function ($query) use ($userid) {
                $query->select('empresa_id')->from('user_empresas')->where('user_id', '=', $userid);
            })
            ->orderBy('name')
            ->get();

        return response()->json(
            $empDisp->toArray()
        );
    }

    public function store(UserEmpresaRequest $request)
    {
        DB::table('user_empresas')->insertGetId([
            'empresa_id' => $request->empresaId,
            'user_id' =>  $request->userId
        ]);

        $empresa = DB::table('empresas')
            ->where('id', $request->empresaId)
            ->first();

        $nam = $empresa->name;

        return response()->json([
            // $request->empresaId,
            // $request->userId,
            'idUserEmp' => $request->userId,
            'nam' => $nam,
        ]);
    }

    // public function destroy($userId,$idUserEmp)
    public function destroy(Request $request)
    {
        if ($request->ajax()) {

            // $empresa = UserEmpresa::findOrFail($request->userEmpId);
            $emp =  DB::table('empresas')->where('id', $request->empresaId)->first();
            // $empresa = UserEmpresa::where('empresa_id', $request->empresa_id)->where('user_id', $request->user_id)->delete();
            $empresa = DB::table('user_empresas')->where('empresa_id', $request->empresa_id)->where('user_id', $request->user_id)->delete();

            return response()->json(
                [
                    'em' => $empresa,
                    'idEmp' => $request->userEmpId,
                    'idUser' => $request->userId,
                    'nam' => $emp->name,
                    'idUserEmp' => $request->userEmpId,
                ]
            );
        }
    }

    public function duplicadosUserEmpresa($userId, $empresaId)
    {
        $emp = UserEmpresa::where('user_id', $userId)->andWhere('empresa_id', $empresaId)->findOrFail();
        return $emp;
    }
}
