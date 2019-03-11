@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Usuarios</a>
                </li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>

            <!-- Usuarios table -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- tabla usuarios -->
            @include('partials._cardUsers')
        </div>

@endsection