<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <!-- Select2 styles for this template-->
        <link href="{{asset('css/select2.css')}}" rel="stylesheet" />
        <!-- Custom styles for this template-->
        <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
        <!-- Custom styles for this app -->
        <link href="{{asset('css/erp.css')}}" rel="stylesheet">



        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
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

        @yield('scriptsextra')
        @stack('scriptchosen')
    </body>
</html>



