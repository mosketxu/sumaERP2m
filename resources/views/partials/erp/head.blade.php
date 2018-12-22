    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Suma Apoyo Empresarial SL - ERP">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- Bootstrap core CSS v4.1.3-->
    {{-- <link href="{{asset('storage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">   --}}
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">  

    <!-- Custom fonts for this template v5.3.1-->
    {{-- <link href="{{asset('storage/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"> --}}
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    {{-- <link href="{{asset('storage/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('css/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

    <!-- Custom styles for this app -->
    <link href="{{asset('css/suma.css')}}" rel="stylesheet">

    <!-- Custom styles for this app -->
    <link href="{{asset('css/erp.css')}}" rel="stylesheet">

    <link rel="icon" href="{{ asset('favicon.png') }}">

    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">