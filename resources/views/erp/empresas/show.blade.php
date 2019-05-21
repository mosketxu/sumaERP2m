@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('empresas.index')}}">Empresas</a>
                </li>
                <li class="breadcrumb-item active">{{$empresa->name}}</li>
            </ol>
            <div class="row">
                <div class="col">
                    @include('partials._cardEmpresa')
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @include('partials._cardContactos')
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @include('partials._cardBancos')
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    @include('partials._cardCondicionesFacturacion')
                </div>
                <div class="col-6">
                    @include('partials._cardPus')
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scriptsextra')
@endsection