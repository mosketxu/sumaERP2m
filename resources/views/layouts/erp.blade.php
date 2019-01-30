<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials._head')
        
        <!-- Page level plugin CSS-->
        <link href="{{asset('css/dataTables.bootstrap4.css')}}" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
        <!-- Custom styles for this app -->
        <link href="{{asset('css/erp.css')}}" rel="stylesheet">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
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



