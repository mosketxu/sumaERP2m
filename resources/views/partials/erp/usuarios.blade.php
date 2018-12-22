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

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Usuarios
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableUsuarios" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Rol</th>
                                <th>email</th>
                                <th>email verificado</th>
                                <th>Estado</th>
                                <th>Op.</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->lastname}}</td>
                                <td>{{$usuario->role->rol}}</td>
                                <td>{{$usuario->email}}</td> 
                                <td>{{$usuario->email_verified_at}}</td> 
                                <td>
                                    @if($usuario->estado==1)
                                        <i class="fa fa-check text-success"></i>
                                    @else
                                        <i class="far fa-times-circle text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('empresas.show',$usuario->slug) }}"><i class="far fa-eye text-success"></i></a>
                                    <a href="{{route('empresas.edit',$usuario->id) }}"><i class="far fa-edit text-primary"></i></a>
                                    <a href="{{route('empresas.destroy',$usuario->id) }}"><i class="far fa-trash-alt text-danger"></i></a>
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

@section('scriptsextra')
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
        $('#dataTableUsuarios').DataTable();
        });
    </script>
@endsection
