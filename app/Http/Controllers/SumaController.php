<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumaController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    // public function suma($tag)
    // {
    //     return view('partials.suma.' . $tag);
    // }

    public function servicios()
    {
        return view('partials.suma.servicios');
    }
    public function equipo()
    {
        return view('partials.suma.equipo');
    }
    public function clientes()
    {
        return view('partials.suma.clientes');
    }
    public function contacto()
    {
        return view('partials.suma.contacto');
    }
    public function politica()
    {
        return view('partials.suma.politica');
    }
}
