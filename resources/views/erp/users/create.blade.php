@extends('layouts.erp')
@section('ruta','Usuarios')
@section('title','Crear Usuario')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index')}}">@yield('ruta')</a>
                </li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
            <!-- Formulario nuevo usuario -->
        @include('partials._cardNewUser')        
    </div>
@endsection

@push('scriptchosen')
    <script>
        $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Empresas asociadas'
            });
        });
    </script>
@endpush
