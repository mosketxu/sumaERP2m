@extends('layouts.erp')
@section('ruta','Contactos')
@section('title','Listado de contactos')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('contacto.index')}}">@yield('ruta')</a>
                </li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>

            <!-- tabla contactos -->
            @include('partials._tablaContactos')
        </div>
@endsection

@section('scriptsextra')
@endsection