@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Usuarios</a>
                </li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>

            <!-- Usuarios table -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mb-3">
                <div class="card-header text-primary">
                    <div class="row">
                        <div class="col-auto mr-auto">
                            <i class="fas fa-users"></i> Usuarios
                        </div>
                        <div class="col-auto">
                            <a href="{{route('user.create') }}" title="Nuevo usuario"><i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm small" id="dataTableUsuarios" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Rol</th>
                                    <th>email</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->lastname}}</td>
                                    <td>{{$usuario->role->rol}}</td>
                                    <td>{{$usuario->email}}</td> 
                                    <td>
                                        @if($usuario->estado==1)
                                            <i class="fa fa-check text-success"></i>
                                        @else
                                            <i class="far fa-times-circle text-danger"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit',$usuario->id) }}"><i class="far fa-edit text-primary"></i></a>
                                        <a href="{{route('user.destroy',$usuario->slug) }}"><i class="far fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection