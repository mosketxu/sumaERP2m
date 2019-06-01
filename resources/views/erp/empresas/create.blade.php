@extends('layouts.erp')
@section('ruta','Empresas')
@section('title','Crear Empresa')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('empresas.index')}}">@yield('ruta')</a>
                </li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
            <!-- Formulario nuevo usuario -->
        @include('partials._cardEmpresaNew')        
    </div>
@endsection
@push('scriptchosen')
    <script>
        function cambiaMarta(){
            var $susana=100 - parseInt($('#newempresamarta').val());
            $('#newempresasusana').val($susana);
            $('#newtotalmartasusana').val($susana+parseInt($('#newempresamarta').val()));
        }
        function cambiaSusana(){
            var $marta=100 - parseInt($('#newempresasusana').val());
            $('#newempresamarta').val($marta);
            $('#newtotalmartasusana').val(parseInt($('#newempresasusana').val())+$marta);
        }
    </script>
@endpush
