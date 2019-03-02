@extends('layouts.erp')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Empresa</a>
                </li>
                <li class="breadcrumb-item active">{{$empresa->name}}</li>
            </ol>
        </div>
        <!-- datos empresas -->
        <div class="card mb-3">
            <div class="card-header text-primary">
                <div class="row">
                        <div class="col-auto ">
                            <i class="fas fa-fw fa-address-card"></i>
                            Listado Empresas
                        </div>
                        <div class="col-auto mr-auto"></div>
                        <div class="col-auto mr-auto"></div>
                        <div class="col-auto">
                            <form method="GET" action="">
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
            <div class="card-body">
                #:{{$empresa->id}}
                Empresa:{{$empresa->name}}
                Tipo:{{$empresa->tipoempresa->tipempr3}}
                Cif:{{$empresa->cifnif}}
                Conta.:{{$empresa->cuentacontable}}
                Banco:
                Iban:
                P.Pago:
                F.Pago:
                Vto:
                Estado:@if($empresa->estado==1) 
                            <i class="fa fa-check "></i>
                        @else
                            <i class="far fa-times-circle text-danger"></i>
                        @endif

                                {{-- @foreach ($empresa->bancos as $banco)
                                    <td>{{substr($banco->bank,0,5)}}</td>
                                    <td>{{$banco->iban}}</td>
                                @endforeach
                                @foreach ($empresa->condFacturacions as $condFact)
                                    <td>{{substr($condFact->periodopago,0,5)}}</td>
                                    <td>{{substr($condFact->formapago,0,5)}}</td>
                                    <td>{{$condFact->diavencimiento}}</td>
                                @endforeach --}}
            </div>
            <div class="card-footer">
                footer
            </div>
        </div>
    </div>
@endsection


@section('scriptsextra')
@endsection
