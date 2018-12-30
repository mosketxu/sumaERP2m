@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>
        
        <!-- tabla empresas -->
        <div class="card mb-3">
            <div class="card-header text-primary">
                <div class="row">
                        <div class="col-auto mr-auto">
                            <i class="fas fa-fw fa-address-card"></i>
                            Listado Empresas
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search fa-sm text-primary"></i></span>
                                </div>
                                <input id="search"  type="text" class="form-control" name="search" placeholder="Search for..."/>
                            </div>


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
                                    <a href="{{route('empresas.show',$empresa->slug) }}" title="Show"><i class="far fa-eye text-success"></i></a>
                                    <a href="{{route('empresas.edit',$empresa->slug) }}"  title="Edit"><i class="far fa-edit text-primary"></i></a>
                                    <a href="{{route('empresas.destroy',$empresa->slug)}}" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
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
    </div>
@endsection

@section('scriptsextra')
    <script type="text/javascript">
        $('#search').on('keyup',function(){
            $value=$(this).val();
            if ($value){
                $.ajax({
                    type : 'get',
                    //url : '{{URL::to('/erp/empresas/search')}}',
                    url : '{{route('empresas.search')}}',
                    data:{'search':$value},
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            }
            else{
               // alert('no hay');
            }
        })
    </script>

    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection
