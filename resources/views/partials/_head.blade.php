    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Suma Apoyo Empresarial SL - ERP">

    <title>@yield('title')</title>

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