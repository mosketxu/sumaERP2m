<!DOCTYPE html>
<html lang="es">

<head>
    @include('suma._head')
</head>

<body data-spy="scroll" data-target="#main-nav" id="home">
    <header>
        @include('suma._menu')
    </header>
    @yield('carrusel')
    @yield('content')
    @yield('content2')

</body>
<!-- FOOTER -->

<footer id="main-footer" class=@yield('piefijo')>
    @include('suma._footer')
</footer>


@include('partials._scriptscomun')
@yield('scriptsextra')
