@extends('layouts.suma')

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
        @include('suma.es.politicaEs')    
    @endsection
@else
    @section('title','Suma - Private Policy')
    @section('content')
        @include('suma.en.politicaEn')    
    @endsection
@endif

@section('scriptsextra')
    <script>
        // Get the current year for the copyright
        $('#year').text(new Date().getFullYear()); 
        
        // Botón subir
        $(document).ready(function() {
            // Show or hide the sticky footer button
            $(window).scroll(function() {
                if ($(this).scrollTop() > 200) {
                    $('.go-top').fadeIn(200);
                } else {
                    $('.go-top').fadeOut(200);
                }
            });

            // Animate the scroll to top
            $('.go-top').click(function(event) {
                event.preventDefault();
                $('html, body').animate({scrollTop: 0}, 1200);
            })
        });
    </script> 
@endsection