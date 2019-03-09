<div class="card border-info text-info my-1">
    <div class="card-header py-0 px-1">
        <div class="form-row mx-105">
            <div class="form-group col-sm-6 my-1 px-1">
                <label class="display-sm1"><a data-toggle="collapse" href="#datosOcultosEmpresa"><i class="fas fa-plus-circle text-info"></i></a> Empresa</label>
            </div>
            <div class="form-group col-sm-4  my-1 px-1 ">
                <label class="display-sm1">Nif</label>
            </div>
            <div class="form-group col-sm-2  my-1 px-1 ">
                <label  class="display-sm1">C.P.</label>
            </div>
        </div>
    </div>
    <div class="card-body p-1" id="cardEmpresa">
    @if($empresa->estado===0)
        <div class="form-row mx-105 bg-noactivo">
    @elseif($empresa->estado===1)
        <div class="form-row mx-105 bg-activo">
    @else
        <div class="form-row mx-105 bg-medioactivo">
    @endif
            <div class="form-group col-sm-6 my-1 px-1">
                <input type="text" name="empresa" class="form-control-plaintext form-control-sm" id="empresa" value="{{$empresa->name}}" readonly>
            </div>
            <div class="form-group  col-sm-4 my-1 px-1">
                <input type="text" name="cifnif" class="form-control-plaintext form-control-sm" id="cifnif" value="{{$empresa->cifnif}}" readonly>
            </div>
            <div class="form-group col-sm-2 my-1 px-1">
                <input type="text" name="codpostal" class="form-control-plaintext form-control-sm" id="codpostal" value="{{$empresa->codpostal}}" readonly>
            </div>
        </div>
        <div class="collapse" id="datosOcultosEmpresa">
            <div class="form-row mx-105">
                <div class="form-group col-sm-6">
                    <label for="direccion" class="display-sm1">Direccion</label>
                    <input type="text" name="direccion" class="form-control form-control-sm" id="direccion" value="{{$empresa->direccion}}" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label for="localidad" class="display-sm1">Localidad</label>
                    <input type="text" name="localidad" class="form-control form-control-sm" id="localidad" value="{{$empresa->localidad}}" readonly>
                </div>
            </div>
            <div class="form-row mx-105">
                <div class="form-group col-sm-6">
                    <label for="provincia_id" class="display-sm1">Provincia</label>
                    <input type="text" name="provincia_id" class="form-control form-control-sm" id="provincia_id" value="{{$empresa->provincia_id}} - {{$empresa->provincia->name}}" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label for="pais_id" class="display-sm1">Pais</label>
                    <input type="text" name="pais_id" class="form-control form-control-sm" id="pais_id" value="{{$empresa->pais_id}} - {{$empresa->pais->name}}" readonly>
                </div>
            </div>
            <div class="form-row mx-105">
				<div class="form-group col-sm-6">
					<label for="tipo" class="display-sm1">Tipo</label>
					<input type="text" name="tipoempresa" class="form-control form-control-sm" id="tipoempresa" value="{{$empresa->tipoempresa->tipoempresa}}" readonly/>
				</div>
                <div class="form-group  col-sm-3">
					<label for="idioma" class="display-sm1">Idioma</label>
					<input type="text" name="idioma" class="form-control form-control-sm" id="idioma" value="{{$empresa->idioma}}" readonly>
				</div>
				<div class="form-group  col-sm-3">
					<label for="cuentacontable" class="display-sm1">Contabilidad</label>
					<input type="text" name="cuentacontable" class="form-control form-control-sm" id="cuentacontable" value="{{$empresa->cuentacontable}}" readonly>
				</div>
            </div>
            <div class="form-row mx-105">
				<div class="form-group  col-sm-3">
					<label for="tfno" class="display-sm1">Tfno</label>
					<input type="text" name="tfno" class="form-control form-control-sm" id="tfno" value="{{$empresa->tfno}}" readonly>
				</div>
				<div class="form-group  col-sm-5">
					<label for="email" class="display-sm1">Email</label>
					<input type="email" name="email" class="form-control form-control-sm" id="email" value="{{$empresa->email}}" readonly>
				</div>
				<div class="form-group  col-sm-4">
					<label for="web" class="display-sm1">Web</label>
					<input type="text" name="web" class="form-control form-control-sm" id="web" value="{{$empresa->web}}" readonly>
				</div>
            </div>
            <div class="form-row mx-105">
                <div class="form-group col-sm-2">
                    <label for="estado" class="display-sm1">Estado</label>
                    <input type="text" name="estado" class="form-control form-control-sm" id="estado" value="{{$empresa->estado}}" readonly>
                </div>
                <div class="form-group col-sm-10">
                    <label for="observaciones" class="display-sm1">Observaciones</label>
                    <textarea name="observaciones" class="form-control form-control-sm" id="observaciones">{{$empresa->observaciones}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
