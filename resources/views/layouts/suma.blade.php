<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Suma Apoyo Empresarial SL - ERP">


        <link rel="icon" href="{{ asset('favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

        <!-- Bootstrap core CSS v4.1.3-->
        <link href="{{asset('css/app.css')}}" rel="stylesheet">  
        <!-- Custom fonts for this template v5.3.1-->
        <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Custom styles for this app -->
        <link href="{{asset('css/suma.css')}}" rel="stylesheet">

        @stack('styles')
        
        <title>@yield('title')</title>
    </head>

    <body data-spy="scroll" data-target="#main-nav" id="home">
        <header>
            @include('suma._menu')
        </header>
        @yield('carrusel')
        @yield('content')
        @yield('content2')

        <footer id="main-footer" class=@yield('piefijo')>
            <div class="container">
                <div class="row">
                    <div class="col text-white">
                        <h4 class="display-8 mt-1 p-0">Suma Apoyo Empresarial</h4>
                        <h5><a href="mailto:info@sumaempresa.com" class="display-9 text-white m-0 p-0"><strong>  info@sumaempresa.com</strong></a></h5>
                        <div class="d-flex justify-content-between text-center mb-2 p-0">
                            <p class="display-9 m-0 p-0">Copyright &copy; <span id="year"></span> </p>
                            <a class="display-9 text-right m-0 p-0" href={{ route( 'suma.politica') }}>
                                <span>{{__("Politica de seguridad")}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- boton subir-->
            <a class="go-top " href="# ">{{__("Subir")}}</a>
        </footer>
    </body>

    @include('partials._scriptscomun')
    @yield('scriptsextra')
</html>