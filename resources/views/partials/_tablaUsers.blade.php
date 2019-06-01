<div class="card mb-3">
    <div class="card-header text-primary">
        <div class="row">
                <div class="col-auto ">
                    <i class="fas fa-fw fas fa-users"></i>
                    Listado Usuarios
                </div>
                @can('create',\App\Usuarios::class)
                    <div class="col-auto mr-auto">
                        <a  href="{{route('user.create') }}" role="button"><i class="fas fa-plus-circle fa-lg text-primary"></i></a>
                    </div>
                @else
                    <div class="col-auto mr-auto"></div>
                @endcan
                <div class="col-auto">
                    <form method="GET" action="{{route('user.index') }}">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search fa-sm text-primary"></i></span>
                            </div>
                            <input id="busca" name="busca"  type="text" class="form-control" name="search" value='{{$busqueda}}' placeholder="Search for..."/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabla_users" class="table table-hover table-sm small" cellspacing="0" width=100%>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Rol</th>
                        <th>Email</th>
                        <th class="text-right">Est. &nbsp; &nbsp;  &nbsp; Op. &nbsp; &nbsp; </th>
                    </tr>
                </thead>
                <tbody class="text-muted buscar">
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->lastname}}</td>
                        <td>{{$usuario->role->role}}</td>
                        <td>{{$usuario->email}}</td> 
                        <td class="text-right">
                            {{-- <form action="{{ route('user.destroy', $usuario->id)}}" method="post"> --}}
                            @if($usuario->estado===0)
                            <i class="fas fa-circle text-danger fa-xs"></i>
                            @elseif($usuario->estado===1)
                            <i class="fas fa-circle text-success fa-xs"></i>
                            @else
                            <i class="fas fa-circle text-warning fa-xs"></i>
                            @endif
                            &nbsp; &nbsp;
                                <a href="{{route('user.show',$usuario->slug) }}" title="Show"><i class="far fa-eye text-success"></i></a>
                                <a href="{{route('user.edit',$usuario->slug) }}"  title="Edit"><i class="far fa-edit text-primary"></i></a>
                                {{-- @csrf --}}
                                {{-- @method('DELETE') --}}
                                {{-- <button class="btn btn-link m-0 p-0" type="submit"><i class="far fa-fw fa-trash-alt btn-sm text-danger"></i></button> --}}
                            {{-- </form> --}}
                            <a href="{{route('user.destroy',$usuario->id)}}" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination-sm">
                {{ $usuarios->links() }}
            </div>
        </div>
    </div>
</div>