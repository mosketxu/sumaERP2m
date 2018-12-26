<div class="card mb-3">
    <div class="card-header">
        <div class="row">
                <div class="col">
                    <i class="fas fa-fw fa-address-card"></i>
                    Listado Empresas
                </div>
                <div class="nav justify-content-end">
                    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                        <div class="input-group-sm">
                            <input id="search" name="search" type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <button class="btn btn-primary btn-sm" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabla_empresas" class="table table-hover table-sm small" cellspacing="0" width=100%>
                <thead>
                    <tr>
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
                        <td>{{$empresa->name}}</td>
                        <td>{{$empresa->tipempr3}}</td>
                        <td>{{$empresa->cifnif}}</td>
                        <td>{{$empresa->cuentacontable}}</td> 
                        <td>{{substr($empresa->bank,0,5)}}</td>
                        <td>{{$empresa->iban}}</td>
                        <td>{{substr($empresa->periodopago,0,5)}}</td>
                        <td>{{substr($empresa->formapago,0,5)}}</td>
                        <td>{{$empresa->diavencimiento}}</td>
                        <td>
                            @if($empresa->estado==1)
                                <i class="fa fa-check "></i>
                            @else
                                <i class="far fa-times-circle text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('empresas.show',$empresa->slug) }}"><i class="far fa-eye text-success"></i></a>
                            <a href="{{route('empresas.edit',$empresa->id) }}"><i class="far fa-edit text-primary"></i></a>
                            <a href="{{route('empresas.destroy',$empresa->id) }}"><i class="far fa-trash-alt text-danger"></i></a>
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