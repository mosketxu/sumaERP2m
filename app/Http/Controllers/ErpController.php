<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades \{
    DB, Auth
};
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Empresa;
use function GuzzleHttp\json_encode;


class ErpController extends Controller
{
    public function index()
    {
        $numempresas = DB::table('empresas')->count();
        $user = Auth::user();
        return view('erp.dashboard', compact('numempresas', 'user'));
    }
}