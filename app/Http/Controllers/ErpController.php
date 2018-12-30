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
        $numempresas = DB::table('empresas')->count();
        return view('partials.erp.dashboard', compact('numempresas'));
    }
}