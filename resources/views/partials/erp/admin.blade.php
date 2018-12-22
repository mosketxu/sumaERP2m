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

        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">26 New Messages!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right"><i class="fas fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">11 New Tasks!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right"><i class="fas fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">123 New Orders!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right"><i class="fas fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                        </div>
                        <div class="mr-5">13 New Tickets!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right"><i class="fas fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Area Chart Example-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>Area Chart Example
            </div>
            <div class="card-body">
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Table Example
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        <tbody>
                        @foreach ($empresas as $empresa)
                            <tr>
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
                                    <a href="{{route('empresas.show',$empresa->slug) }}"><i class="far fa-eye text-success"></i></a>
                                    <a href="{{route('empresas.edit',$empresa->id) }}"><i class="far fa-edit text-primary"></i></a>
                                    <a href="{{route('empresas.destroy',$empresa->id) }}"><i class="far fa-trash-alt text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
@endsection

@section('scriptsextra')
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
        $('#dataTable').DataTable();
        });
    </script>
@endsection
