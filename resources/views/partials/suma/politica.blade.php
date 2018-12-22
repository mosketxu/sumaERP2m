@extends('layouts.layoutsuma')

@section('piefijo','fixed-bottom mt-5 mb-3')
@section('politica','active')
@section('carrusel')
    <div class="container">
        <div class="col-md-12 mt-5 ">
            <div id="imgTop" class="" >
                <img src="storage/img/LOGO_SUMA_1200x400.jpg" class="img-responsive carousel" alt="Suma Apoyo Empresarial S.L.">
            </div>
        </div>
    </div>
@endsection

@if(App::getLocale()=='es')
    @section('title','Suma - Politica Seguridad')
    @section('content')
        @include('partials.suma.es.politicaEs')    
    @endsection
@else
    @section('title','Suma - Private Policy')
    @section('content')
        @include('partials.suma.en.politicaEn')    
    @endsection
@endif

