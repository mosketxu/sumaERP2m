@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Listado Empresas -->
        <div id="app" class="card mb-3">
            <example-component></example-component>
        </div>
    </div>
@endsection

@section('scriptsextra')
    <script src="{{asset('js/app.js')}}"></script>
@endsection