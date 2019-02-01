@extends('layouts.erp')

@section('title','Crear Usuario')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index')}}">@yield('title')</a>
                </li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header text-primary">
                    <i class="fas fa-user-plus"></i>
                     @yield('title')
                </div>
                <div class="card-body">
                    @include('partials._errores')
                    <form method="post" action="{{ route('user.store') }}">
                        <div class="row">
                            <div class="input-group input-group-sm mb-3 col-sm-6">
                                <div class="input-group-prepend">
                                    @csrf
                                    <span class="input-group-text" ><i class="fas fa-user text-primary"></i></span>
                                </div>
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Nombre"/>
                            </div>
                            <div class="input-group input-group-sm mb-3 col-sm-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-tag text-primary"></i></span>
                                </div>
                                <input type="text" class="form-control" name="userlastname" value="{{ old('userlastname') }}" placeholder="Apellido"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group input-group-sm mb-3 col-sm-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at text-primary"></i></span>
                                </div>
                                <input type="email" class="form-control" name="useremail"  value="{{ old('useremail') }}" placeholder="email"/>
                            </div>
                            <div class="input-group input-group-sm mb-3 col-sm-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-ruler text-primary"></i></span>
                                </div>
                                <select class="custom-select custom-select-sm" name="userroleId">
                                    <option selected>Selecciona un rol...</option>
                                    @foreach ($roles as $role )
                                        <option value="{{$role->id}}">{{$role->rol}}</option>                                
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group input-group-sm mb-3 col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-ruler text-primary"></i></span>
                                </div>
                                <select class="custom-select custom-select-sm multiple" name="userroleId">
                                    <option selected>Selecciona las empresas...</option>
                                    {{-- @foreach ($empresas as $empresa )
                                        <option value="{{$empresa->id}}">{{$empresa->name}}</option>                                
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group input-group-sm mb-3 col-sm-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-unlock-alt text-primary"></i></span>
                                </div>
                                <input type="password" class="form-control" name="userpassword" placeholder="Password mínimo 6 caracteres"/>
                            </div>
                            <div class="input-group input-group-sm mb-3 col-sm-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock text-primary"></i></span>
                                </div>
                                <input type="password" class="form-control" name="userpassword_confirmation" placeholder="confirma el password"/>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

