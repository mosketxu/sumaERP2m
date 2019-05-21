@extends('layouts.erp')
@section('ruta','Empresas')
@section('title','Crear Empresa')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('empresas.index')}}">@yield('ruta')</a>
                </li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
            <!-- Formulario nuevo usuario -->
        @include('partials._cardNewEmpresa')        
    </div>
@endsection
