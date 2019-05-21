@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Contactos</a>
                </li>
                <li class="breadcrumb-item active">Contactos</li>
            </ol>

            <!-- Contactos table -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- tabla usuarios -->
            @include('partials._cardContactos')
        </div>

@endsection