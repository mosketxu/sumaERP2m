@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Empresa</a>
                </li>
                <li class="breadcrumb-item active">{{$empresa->name}}</li>
            </ol>
            <div class="row">
                <div class="col-sm-4 px-1">
                    @include('partials._cardPpalEmpresa')
                    @include('partials._cardContactos')
                </div>
                <div class="col-sm-4  px-1  ">
                    @include('partials._cardBancos')
                    @include('partials._cardCondicionesFacturacion')
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scriptsextra')
@endsection