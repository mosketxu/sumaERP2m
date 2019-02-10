@extends('layouts.erp')

@section('title','Crear genero')

@section('content')
    <form method="POST" action="">
        <div class="alert alert-success alert-dissmisible" id="msj-success" role="alert" style="display:none">
            <strong>Todo OK</strong>
        </div>
        <div id="msj-error" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
                <strong id="msj"> </strong>
        </div>


        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">
        @include('genero.form.genero')
        <a href="#" class="btn btn-primary" id="registro">Registrar</a>
    </form>

@endsection

@section('scriptsextra')
@endsection

@push('scriptchosen')
    <script src="{{asset('/js/createGeneroAjax.js')}}"></script>
@endpush
