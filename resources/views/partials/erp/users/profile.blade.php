@extends('layouts.erp')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index')}}">Usuarios</a>
                </li>
                <li class="breadcrumb-item active">Avatar</li>
            </ol>
    
            <div class="card mb-3">
                <div class="card-header text-primary">
                    <i class="fas fa-user"></i>
                    Avatar de {{$user->name}}
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row justify-content-center">
                            <div class="img-thumbnail rounded-circle">
                                <img class=" photoUsuario" src="{{asset('storage/img/avatar/'.$user->avatar)}}" />
                            </div>
                    </div>
                    <div class="row justify-content-center">
                        <form method="post" action="{{ route('user.updateavatar') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection