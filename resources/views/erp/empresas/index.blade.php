@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Empresas</a>
            </li>
            <li class="breadcrumb-item active">Listado de Empresas</li>
        </ol>

        <!-- tabla empresas -->
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
                        @endcan
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
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
                {!! Form::open(['route'=>'erp.empresas.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
                <div class="form-group">
                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar empresa']) !!}
                </div>
                {!! Form::open()!!}
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
                                @foreach ($empresa->condFacturacions as $condFact)
                                    <td>{{substr($condFact->periodopago,0,5)}}</td>
                                    <td>{{substr($condFact->formapago,0,5)}}</td>
                                    <td>{{$condFact->diavencimiento}}</td>
                                @endforeach
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
    </div>
@endsection

@section('scriptsextra')
@endsection
