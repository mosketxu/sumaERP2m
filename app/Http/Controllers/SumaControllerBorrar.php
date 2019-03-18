<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumaController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function servicios()
    {
        return view('suma.servicios');
    }
    public function equipo()
    {
        return view('suma.equipo');
    }
    public function clientes()
    {
        return view('suma.clientes');
    }
    public function contacto()
    {
        return view('suma.contacto');
    }
    public function politica()
    {
        return view('suma.politica');
    }
}
