<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.erp.head')
    </head>

    <body id="page-top">
        {{-- <header id="header" class="header"> --}}
            @include('partials.erp.topmenu')
        {{-- </header> --}}

        <section id="wrapper">
            @include('partials.erp.sidebar')
            @yield('content')
        </section>

        @include('partials.scriptscomun')
        @include('partials.erp.scripts')
        @yield('scriptsextra')
    </body>
</html>



