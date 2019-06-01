<div class="card mb-3">
    <div class="card-header text-primary">
        <div class="row">
                <div class="col-auto ">
                    <i class="fas fa-fw fa-address-card"></i>
                    Listado Contactos
                </div>
                @can('create',\App\Contacto::class)
                    <div class="col-auto mr-auto">
                        <a  href="{{route('contacto.create') }}" role="button"><i class="fas fa-plus-circle fa-lg text-primary"></i></a>
                    </div>
                @else
                    <div class="col-auto mr-auto"></div>
                @endcan
                <div class="col-auto">
                    <form method="GET" action="{{route('contacto.index') }}">
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
            <table id="tabla_contactos" class="table table-hover table-sm small" cellspacing="0" width=100%>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email 1</th>
                        <th>Email 2</th>
                        <th>Tfno. 1</th>
                        <th>Tfno. 2</th>
                        <th>Departamento</th>
                        <th class="text-right">Est. &nbsp; &nbsp;  &nbsp; Op. &nbsp; &nbsp; </th>
                    </tr>
                </thead>
                <tbody class="text-muted buscar">
                @foreach ($contactos as $contacto)
                    <tr>
                        <td>{{$contacto->id}}</td>
                        <td>{{$contacto->name}}</td>
                        <td>{{$contacto->lastname}}</td>
                        <td>{{$contacto->email1}}</td>
                        <td>{{$contacto->email2}}</td>
                        <td>{{$contacto->telefono1}}</td> 
                        <td>{{$contacto->telefono2}}</td> 
                        <td>{{optional($contacto->departamento)->departamento}}</td>
                        <td class="text-right">
                            @if($contacto->estado===0)
                            <i class="fas fa-circle text-danger fa-xs"></i>
                            @elseif($contacto->estado===1)
                            <i class="fas fa-circle text-success fa-xs"></i>
                            @else
                            <i class="fas fa-circle text-warning fa-xs"></i>
                            @endif
                            &nbsp; &nbsp;
                            <a href="{{route('contacto.show',$contacto->slug) }}" title="Show"><i class="far fa-eye text-success"></i></a>
                            <a href="{{route('contacto.edit',$contacto->slug) }}"  title="Edit"><i class="far fa-edit text-primary"></i></a>
                            <a href="{{route('contacto.destroy',$contacto->id)}}" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination-sm">
                {{ $contactos->links() }}
            </div>
        </div>
    </div>
</div>
