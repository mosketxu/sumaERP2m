<div class="card text-white my-1">
    <div class="card-header bg-info py-0 px-1">
        <div class="form-row mx-105">
            <div class="form-group col my-1 px-1 ">
                <label class="display-sm1"><a data-toggle="collapse" href="#datosOcultosEmpresa"><i class="fas fa-plus-circle text-white"></i></a> Empresa</label>
            </div>
            <div class="form-group col  my-1 px-1  ">
                <label class="display-sm1">Nif</label>
            </div>
            <div class="form-group col  my-1 px-1  ">
                <label  class="display-sm1">C.P.</label>
            </div>
            <div class="form-group col  my-1 px-1  ">
                <label  class="display-sm1">Email</label>
            </div>
            <div class="form-group col  my-1 px-1  ">
                <label  class="display-sm1">Web</label>
            </div>
            <div class="form-group col  my-1 px-1 ">
                <label  class="display-sm1">Tfno</label>
            </div>
            <div class="form-group col  my-1 px-1 ">
                <label  class="display-sm1">Tipo</label>
            </div>
            <div class="form-group col  my-1 px-1 ">
                <label  class="display-sm1">Idioma</label>
            </div>
            <div class="form-group col  my-1 px-1 ">
                <label  class="display-sm1">Subcta.</label>
            </div>
            <div class="form-group col-1  my-1 px-1  text-center">
                <label class="display-sm1">Op.</label>
            </div>
        </div>
    </div>
    <div class="card-body p-1" id="cardEmpresa">
        <div class="form-row mx-105">
            <div class="form-group col my-1 px-1">
                <input type="text" name="empresa" class="form-control-plaintext form-control-sm " id="empresa" value="{{$empresa->name}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="cifnif" class="form-control-plaintext form-control-sm " id="cifnif" value="{{$empresa->cifnif}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="codpostal" class="form-control-plaintext form-control-sm " id="codpostal" value="{{$empresa->codpostal}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="email" name="email" class="form-control-plaintext form-control-sm " id="email" value="{{$empresa->email}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="web" class="form-control-plaintext form-control-sm " id="web" value="{{$empresa->web}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="tfno" class="form-control-plaintext form-control-sm" id="tfno" value="{{$empresa->tfno}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="tipoempr3" class="form-control-plaintext form-control-sm " id="tipoempr3" value="{{$empresa->tipoempresa->tipempr3}}" readonly/>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="idioma" class="form-control-plaintext form-control-sm" id="idioma" value="{{$empresa->idioma}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="cuentacontable" class="form-control-plaintext form-control-sm" id="cuentacontable" value="{{$empresa->cuentacontable}}" readonly>
            </div>
            <div class="form-group col-1 my-1 px-1 text-right">
                @if($empresa->estado===0)
                <i class="fas fa-circle text-danger fa-xs"></i>
                @elseif($empresa->estado===1)
                <i class="fas fa-circle text-success fa-xs"></i>
                @else
                <i class="fas fa-circle text-warning fa-xs"></i>
                @endif
                &nbsp;&nbsp;
                <a href="{{route('empresas.edit',$empresa->slug) }}"  title="Edit"><i class="far fa-edit text-primary"></i></a>
                <a href="{{route('empresas.destroy',$empresa->id)}}" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
            </div>

        </div>
        <div class="collapse" id="datosOcultosEmpresa">
            <div class="form-row mx-105">
                <div class="form-group col-sm-3">
                    <label for="direccion" class="display-sm1">Direccion</label>
                    <input type="text" name="direccion" class="form-control form-control-sm" id="direccion" value="{{$empresa->direccion}}" readonly>
                </div>
                <div class="form-group col-sm-3">
                    <label for="localidad" class="display-sm1">Localidad</label>
                    <input type="text" name="localidad" class="form-control form-control-sm" id="localidad" value="{{$empresa->localidad}}" readonly>
                </div>
                <div class="form-group col-sm-3">
                    <label for="provincia_id" class="display-sm1">Provincia</label>
                    <input type="text" name="provincia_id" class="form-control form-control-sm" id="provincia_id" value="{{$empresa->provincia_id}} - {{$empresa->provincia->name}}" readonly>
                </div>
                <div class="form-group col-sm-3">
                    <label for="pais_id" class="display-sm1">Pais</label>
                    <input type="text" name="pais_id" class="form-control form-control-sm" id="pais_id" value="{{$empresa->pais_id}} - {{$empresa->pais->name}}" readonly>
                </div>
            </div>
            <div class="form-row mx-105">
                <div class="form-group col">
                    <label for="observaciones" class="display-sm1">Observaciones</label>
                    <textarea name="observaciones" class="form-control form-control-sm" id="observaciones">{{$empresa->observaciones}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
