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
            
            <div class="card mb-3">
                <div class="card-header text-primary">
                <!-- Banner -->
                    <div class="row">
                            <div class="col-auto ">
                                <i class="fas fa-fw fa-address-card"></i>
                                {{$empresa->alias}}
                            </div>
                            <div class="col-auto mr-auto"></div>
                            <div class="col-auto mr-auto"></div>
                            <div class="col-auto"></div>
                        </div>
                    </div>
                </div>
                {{-- Datos empresa --}}
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="empresa" class="display-sm1">
                                Empresa
                                <small id="{{$empresa->id}}" class="ml-2 text-muted">({{$empresa->id}})</small>
                                <small class="mr-4 text-muted"><a data-toggle="collapse" href="#datosEmpresa">más...</a></small>
                            </label>
                            <input type="text" name="empresa" class="form-control form-control-sm" id="empresa" value="{{$empresa->name}}" readonly>
                        </div>
                        <div class="form-group  col-sm-1">
                            <label for="cifnif" class="display-sm1">Nif</label>
                            <input type="text" name="cifnif" class="form-control form-control-sm" id="cifnif" value="{{$empresa->cifnif}}" readonly>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="direccion" class="display-sm1">Direccion</label>
                            <input type="text" name="direccion" class="form-control form-control-sm" id="direccion" value="{{$empresa->direccion}}" readonly>
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="codpostal" class="display-sm1">C.P.</label>
                            <input type="text" name="codpostal" class="form-control form-control-sm" id="codpostal" value="{{$empresa->codpostal}}" readonly>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="localidad" class="display-sm1">Localidad</label>
                            <input type="text" name="localidad" class="form-control form-control-sm" id="localidad" value="{{$empresa->localidad}}" readonly>
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="provincia_id" class="display-sm1">Provincia</label>
                            <input type="text" name="provincia_id" class="form-control form-control-sm" id="provincia_id" value="{{$empresa->provincia_id}} - {{$empresa->provincia->name}}" readonly>
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="pais_id" class="display-sm1">Pais</label>
                            <input type="text" name="pais_id" class="form-control form-control-sm" id="pais_id" value="{{$empresa->pais_id}} - {{$empresa->pais->name}}" readonly>
                        </div>
                    </div>
                    <div class="collapse" id="datosEmpresa">
                        {{-- datos ocultos --}}
                        <div class="card card-body">
                            <div class="form-row">
                                <div class="form-group col-sm-2">
                                    <label for="tipoalias" class="display-sm1">Tipo</label>
                                    <input type="text" name="tipoempresa" class="form-control form-control-sm" id="tipoempresa" value="{{$empresa->tipoempresa->tipoempresa}}" readonly/>
                                </div>
                                <div class="form-group  col-sm-2">
                                    <label for="tfno" class="display-sm1">Tfno</label>
                                    <input type="text" name="tfno" class="form-control form-control-sm" id="tfno" value="{{$empresa->tfno}}" readonly>
                                </div>
                                <div class="form-group  col-sm-3">
                                    <label for="email" class="display-sm1">Email</label>
                                    <input type="email" name="email" class="form-control form-control-sm" id="email" value="{{$empresa->email}}" readonly>
                                </div>
                                <div class="form-group  col-sm-2">
                                    <label for="web" class="display-sm1">Web</label>
                                    <input type="text" name="web" class="form-control form-control-sm" id="web" value="{{$empresa->web}}" readonly>
                                </div>
                                <div class="form-group  col-sm-1">
                                    <label for="idioma" class="display-sm1">Idioma</label>
                                    <input type="text" name="idioma" class="form-control form-control-sm" id="idioma" value="{{$empresa->idioma}}" readonly>
                                </div>
                                <div class="form-group  col-sm-1">
                                    <label for="cuentacontable" class="display-sm1">Contabilidad</label>
                                    <input type="text" name="cuentacontable" class="form-control form-control-sm" id="cuentacontable" value="{{$empresa->cuentacontable}}" readonly>
                                </div>
                                <div class="form-group col-sm-1">
                                    <label for="estado" class="display-sm1">Estado</label>
                                    <input type="text" name="estado" class="form-control form-control-sm" id="estado" value="{{$empresa->estado}}" readonly>
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="form-group col">
                                    <label for="observaciones" class="display-sm1">Observaciones</label>
                                    <textarea name="observaciones" class="form-control form-control-sm" id="observaciones">{{$empresa->observaciones}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p> Banco:</p>
                    <p> Iban:</p>
                    <p> P.Pago:</p>
                    <p> F.Pago:</p>
                    <p> Vto:</p>
                    <p> Estado:@if($empresa->estado==1)
                                <i class="fa fa-check "></i>
                            @else
                                <i class="far fa-times-circle text-danger"></i>
                            @endif
                             </p>

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
    </div>
@endsection


@section('scriptsextra')
@endsection
