@extends('layouts.layoutsuma')
@section('title','Suma Apoyo - Equipo ')
@section('equipo','active')

@if(App::getLocale()=='es')
    @section('title','Suma - Equipo')
    @section('content')
        @include('partials.suma.es.equipoEs')    
    @endsection
@else
    @section('title','Suma - Team')
    @section('content')
        @include('partials.suma.en.equipoEn')    
    @endsection
@endif