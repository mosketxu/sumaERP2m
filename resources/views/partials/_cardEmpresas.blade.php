<div class="card mb-3">
    <div class="card-header text-primary">
        <div class="row">
                <div class="col-auto ">
                    <i class="fas fa-fw fa-address-card"></i>
                    Listado Empresas
                </div>
                @can('create',\App\Empresa::class)
                    <div class="col-auto mr-auto">
                        <a  href="{{route('empresas.create') }}" role="button"><i class="fas fa-plus-circle fa-lg text-primary"></i></a>
                    </div>
                @else
                    <div class="col-auto mr-auto"></div>
                @endcan
                <div class="col-auto">
                    <form method="GET" action="{{route('empresas.index') }}">
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
            <table id="tabla_empresas" class="table table-hover table-sm small" cellspacing="0" width=100%>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Empresa</th>
                        <th>Tipo</th>
                        <th>Cif</th>
                        <th>Conta.</th>
                        <th>Banco</th>
                        <th>Iban</th>
                        <th>P.Pago</th>
                        <th>F.Pago</th>
                        <th>Vto</th>
                        <th>Estado</th>
                        <th>Op.</th>
                    </tr>
                </thead>
                <tbody class="text-muted buscar">
                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{$empresa->id}}</td>
                        <td>{{$empresa->name}}</td>
                        <td>{{$empresa->tipoempresa->tipempr3}}</td>
                        <td>{{$empresa->cifnif}}</td>
                        <td>{{$empresa->cuentacontable}}</td> 
                        @foreach ($empresa->bancos as $banco)
                            <td>{{substr($banco->bank,0,5)}}</td>
                            <td>{{$banco->iban}}</td>
                        @endforeach
                        <td>{{$empresa->condFacturacions->periodopago}}</td>
                        <td>{{$empresa->condFacturacions->formapago}}</td>
                        <td>{{$empresa->condFacturacions->diavencimiento}}</td>
                        <td>
                            @if($empresa->estado==1)
                                <i class="fa fa-check "></i>
                            @else
                                <i class="far fa-times-circle text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('empresas.show',$empresa->slug) }}" title="Show"><i class="far fa-eye text-success"></i></a>
                            <a href="{{route('empresas.edit',$empresa->slug) }}"  title="Edit"><i class="far fa-edit text-primary"></i></a>
                            <a href="{{route('empresas.destroy',$empresa->id)}}" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination-sm">
                {{ $empresas->links() }}
            </div>
        </div>
    </div>
</div>
