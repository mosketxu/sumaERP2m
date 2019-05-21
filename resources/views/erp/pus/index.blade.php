@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Pus</a>
                </li>
                <li class="breadcrumb-item active">Pus</li>
            </ol>

            <!-- Contactos table -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- tabla usuarios -->
            @include('partials._cardPus')
        </div>

@endsection