<!DOCTYPE html>
<html lang="es">

<head>
    @include('partials.suma.head')
</head>

<body data-spy="scroll" data-target="#main-nav" id="home">
    <header>
        @include('partials.suma.menu')
    </header>
    @yield('carrusel')
    @yield('content')
    @yield('content2')

</body>
<!-- FOOTER -->

<footer id="main-footer" class=@yield('piefijo')>
    @include('partials.suma.footer')
</footer>

{{-- @include('partials.suma.scripts') --}}
@include('partials.scriptscomun')
@yield('scriptsextra')
