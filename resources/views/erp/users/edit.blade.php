@extends('layouts.erp')

@section('title','Editar usuario')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index')}}">Usuarios</a>
                </li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header text-primary">
                    <i class="fas fa-user-plus"></i>
                    @yield('title'): {{$userEdit->name}}
                    @include('partials._errores')
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="justify-content-center">
                                <img class="img-thumbnail rounded-circle" src="{{asset('storage/img/avatar/'.$userEdit->avatar)}}" />
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card">
                                <div class="card-header">
                                    Detalles del usuario
                                </div>
                                <form method="post" action="{{ route('user.update',$userEdit->id) }}">
                                    <div class="card-body">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend" title="Nombre">
                                                        <span class="input-group-text" ><i class="fas fa-user text-primary"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="username" value="{{ old('username',$userEdit->name) }}" title="Nombre" placeholder="Nombre" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend" title="Apellidos">
                                                        <span class="input-group-text"><i class="fas fa-user-tag text-primary"></i></span>
                                                    </div>
                                                    
                                                    <input type="text" class="form-control" name="userlastname" value="{{ old('userlastname',$userEdit->lastname) }}" title="Apellidos" placeholder="Apellidos"/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend" title="email">
                                                        <span class="input-group-text"><i class="fas fa-at text-primary"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" name="useremail" value="{{ old('useremail',$userEdit->email) }}" title="email" placeholder="email"/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend" title="Rol">
                                                        <span class="input-group-text"><i class="fas fa-pencil-ruler text-primary"></i></span>
                                                    </div>
                                                    <select class="custom-select custom-select-sm" name="userroleId" id="userroleId" title="Rol">
                                                        <option value="">Selecciona un rol</option>
                                                        @if ($roles->count())
                                                            @foreach($roles as $role)
                                                            <option value="{{ $role->id }}" {{old('userroleId',$userEdit->role_id) == $role->id ? ' selected' : '' }} >{{ $role->rol }}</option> 
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend" title="Password">
                                                        <span class="input-group-text"><i class="fas fa-unlock-alt text-primary"></i></span>
                                                    </div>
                                                    <input type="password" class="form-control" name="userpassword" title="Password" placeholder="Password"/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend" title="Validar Password">
                                                        <span class="input-group-text"><i class="fas fa-lock text-primary"></i></span>
                                                    </div>
                                                    <input type="password" class="form-control" name="userpassword_confirmation" title="Validar Password" placeholder="Validar passwors"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card">
                                <div class="card-header">
                                    Título empresas
                                </div>
                                <div class="card-body">
                                    Tabla empresas
                                </div>
                                <div class="card-footer">
                                    pie empresas
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('user.index')}}">Regresar a Usuarios</a>
                </div>
            </div>
        </div>
    </div>
@endsection