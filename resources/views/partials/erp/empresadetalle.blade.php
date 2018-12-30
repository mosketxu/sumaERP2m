@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Empresas</a>
            </li>
            <li class="breadcrumb-item active">{{$empresa->slug}}</li>
        </ol>
    <h1>Empresa</h1>
    <div>   
        Empresa: {{$empresa->name}}
    </div>
    </div>
@endsection


