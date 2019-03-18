@extends('layouts.erp')
@section('ruta','Admin Panel')
@section('title','Panel de Administrador')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">@yield('ruta')</a>
                </li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
        </div>
        <!-- tabla empresas -->
        @include('partials._cardEmpresas')
    </div>
@endsection

@section('scriptsextra')
@endsection
