@extends('layouts.erp')

@section('title','Editar Usuario')

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
                        <div class="col-sm-2">
                            <div class="justify-content-center">
                                    <img class="img-thumbnail rounded-circle" src="{{asset('storage/img/avatar/'.$userEdit->avatar)}}" />
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <form method="POST" action="{{ route('') }}">
                                @method('PATCH')
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend" title="Nombre">
                                                <span class="input-group-text" ><i class="fas fa-user text-primary"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="username" value="{{ old('username',$userEdit->name) }}" title="Nombre" placeholder="Nombre"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend" title="Apellidos">
                                                <span class="input-group-text"><i class="fas fa-user-tag text-primary"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="userlastname" value="{{ old('userlastname',$userEdit->lastname) }}" title="Apellidos" placeholder="Apellidos" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at text-primary"></i></span>
                                            </div>
                                            <input type="email" class="form-control" name="useremail" value="{{ old('useremail',$userEdit->email) }}" title="email" placeholder="email"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend" title="Categoria de usuario">
                                                <span class="input-group-text"><i class="fas fa-pencil-ruler text-primary"></i></span>
                                            </div>
                                            <select class="custom-select custom-select-sm " name="userrole" id="userrole" searchable="Search here.." title="Categoria de usuario">
                                                <option value="">Selecciona un rol</option>
                                                @if ($roles->count())
                                                    @foreach($roles as $role)
                                                    <option value="{{ $role->role }}" {{old('userrole',$userEdit->role) == $role->role ? ' selected' : '' }} >{{ $role->role }}</option> 
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group input-group-sm mb-3" title="password">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-unlock-alt text-primary"></i></span>
                                            </div>
                                            <input type="password" class="form-control" name="userpassword" title="password" placeholder="password"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend" title="Confirmar password">
                                                <span class="input-group-text"><i class="fas fa-lock text-primary"></i></span>
                                            </div>
                                            <input type="password" class="form-control" name="userpassword_confirmation" title="Confirmar Password" placeholder="Confirmar password"/>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <div class="col-sm-5">
                                {{-- <form method="post" action="{{ route('user.update',$userEdit->id) }}">
                                    @method('PATCH')
                                    @csrf --}}
                                    <div class="row">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend" title="Categoria de usuario">
                                                <span class="input-group-text"><i class="fas fa-pencil-ruler text-primary"></i></span>
                                                </div>
                                                <select class="custom-select custom-select-sm " name="urroleId" id="urroleId" searchable="Search here.." title="Categoria de usuario">
                                                    <option value="">Selecciona un rol</option>
                                                    @if ($roles->count())
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" {{old('userroleId',$userEdit->role) == $role->id ? ' selected' : '' }} >{{ $role->rol }}</option> 
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                    <a href="{{route('user.index')}}">Regresar a Usuarios</a>
                </div>
            </div>
        </div>
    </div>
    @push('scriptchosen')
        <script>
            $(".chosen-rol").chosen({
                placeholder_text_multiple:'Selecciona las empresas'
                
            });
        </script>
    @endpush


@endsection

