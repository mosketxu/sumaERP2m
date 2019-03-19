<div class="card mb-3">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="card-header text-primary">
        <div class="row">
            <div class="col-auto">
                <i class="fas fa-users"></i> 
                Usuarios
            </div>
            @can('view',\App\User::class)
                <div class="col-auto mr-auto">
                    <a href="{{route('user.create') }}" title="Nuevo usuario"><i class="fas fa-plus-circle fa-lg text-primary"></i></a>
                </div>
            @else
                <div class="col-auto mr-auto"></div>
            @endcan
            <div class="col-auto mr-auto"></div>
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
                        <td>{{$usuario->role}}</td>
                        <td>{{$usuario->email}}</td> 
                        <td>
                            @if($usuario->estado==1)
                                <i class="fa fa-check text-success"></i>
                            @else
                                <i class="far fa-times-circle text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('user.destroy', $usuario->id)}}" method="post">
                                <a href="{{route('user.edit',$usuario->id) }}"><i class="far fa-fw fa-edit text-primary"></i></a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link m-0 p-0" type="submit"><i class="far fa-fw fa-trash-alt btn-sm text-danger"></i></button>
                                {{-- <a href="{{route('user.destroy',$usuario->id) }}"><i class="far fa-trash-alt text-danger"></i></a> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>