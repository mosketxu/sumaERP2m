@extends('layouts.suma')
@section('title','Suma Apoyo - Equipo ')
@section('equipo','active')

@if(App::getLocale()=='es')
    @section('title','Suma - Equipo')
    @section('content')
        @include('suma.es.equipoEs')    
    @endsection
@else
    @section('title','Suma - Team')
    @section('content')
        @include('suma.en.equipoEn')    
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