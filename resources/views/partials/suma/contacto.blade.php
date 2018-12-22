@extends('layouts.layoutsuma')
@section('contacto','active')

@if(App::getLocale()=='es')
    @section('title','Suma - Contacto')
@else
    @section('title','Suma - Contact')
@endif

@section('content')
    <!-- CONTACTO SECTION -->
    <section id="contacto-section">
        <div class="container">
            <div class="row mx-2 mt-5">
                <div id="contacto-datos" class="col-md-6 offset-md-3 p-3">
                    <h3 class="display-7 text-muted">{{__("Visítanos en nuestras oficinas de")}}</h3>
                    <p class="display-7 text-primary"><i class="fas fa-map-marker-alt"></i> C/Sant Marian 57, 1º-2ª, Terrassa </p>
                    <p class="display-7 text-muted">{{__("o envíanos un mail a...")}}</p>
                    <a href="mailto:info@sumaempresa.com" class="display-7"><i class="fas fa-at fa-lg"></i> info@sumaempresa.com</a>
                    <p class="small text-muted pt-1 px-4">{{__("Inscrita")}}</p>
                    <a class="display-9 text-right m-0 p-0" href={{ route( 'suma.politica') }}>
                        <span>{{__("Politica de seguridad")}}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection