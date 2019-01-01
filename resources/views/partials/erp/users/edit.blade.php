@extends('layouts.erp')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index')}}">Usuarios</a>
                </li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header text-primary">
                    <i class="fas fa-user-plus"></i>
                     Editar Usuario: {{$userEdit->name}}
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="row justify-content-center">
                                <div class="img-thumbnail rounded-circle">
                                    <img class=" photoUsuario" src="{{asset('storage/img/avatar/'.$userEdit->avatar)}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <form method="post" action="{{ route('user.update',$userEdit->id) }}">
                                @method('PATCH')
                                @csrf
                                <div class="row">
                                    <div class="input-group input-group-sm mb-3 col-sm-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" ><i class="fas fa-user text-primary"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="username" value="{{ old('username',$userEdit->name) }}" />
                                    </div>
                                    <div class="input-group input-group-sm mb-3 col-sm-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tag text-primary"></i></span>
                                        </div>
                                        
                                        <input type="text" class="form-control" name="userlastname" value="{{ old('userlastname',$userEdit->lastname) }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group input-group-sm mb-3 col-sm-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at text-primary"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="useremail" value="{{ old('useremail',$userEdit->email) }}" />
                                    </div>
                                    <div class="input-group input-group-sm mb-3 col-sm-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-ruler text-primary"></i></span>
                                        </div>
                                        <select class="custom-select custom-select-sm" name="userroleId" id="userroleId">
                                            <option value="">Selecciona un rol</option>
                                            @if ($roles->count())
                                                @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{old('userroleId',$userEdit->role_id) == $role->id ? ' selected' : '' }} >{{ $role->rol }}</option> 
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group input-group-sm mb-3 col-sm-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-unlock-alt text-primary"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="userpassword" />
                                    </div>
                                    <div class="input-group input-group-sm mb-3 col-sm-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock text-primary"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="userpassword_confirmation" />
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('user.index')}}">Regresar a Usuarios</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection