@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Empresas</a>
            </li>
            <li class="breadcrumb-item active">Listado de Empresas del usuario</li>
        </ol>

        <!-- tabla empresas -->
        @include('erp.empresas.partials._tempresas')
    </div>
@endsection

@section('scriptsextra')
@endsection
