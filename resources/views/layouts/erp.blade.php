<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials._head')
    </head>

    <body id="page-top">
        <header id="header" class="header">
            @include('partials._topmenu')
        </header>

        <section id="wrapper">
            @include('partials._sidebar')
            @yield('content')
        </section>

        @include('partials._scriptscomun')
        @include('partials._scripts')
        @yield('scriptsextra')
    </body>
</html>



