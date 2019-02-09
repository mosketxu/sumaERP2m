@extends('layouts.erp')

@section('title','Crear genero')

@section('content')
    <div id="content-wrapper">
        <div class="alert alert-success alert-dissmisible" id="msj-success" role="alert" style="display:none">
            <strong>Todo OK</strong>
        </div>
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Operaciones</th>
            </thead>
            <tbody id="datos">
            </tbody>
        </table>
    </div>
    @include('genero.modal')

@endsection

@section('scriptsextra')
@endsection

@push('scriptchosen')
    <script src="{{asset('/js/listarGeneroAjax.js')}}"></script>
@endpush