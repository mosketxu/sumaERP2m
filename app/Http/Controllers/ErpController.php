<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades \DB;


class ErpController extends Controller
{
    public function index()
    {
        $numempresas = DB::table('empresas')->count();
        return view('erp.dashboard', compact('numempresas'));
    }
}