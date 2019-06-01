<div class="card mb-3">
    <div class="card-header text-primary">
        <div class="row">
            <div class="col-auto ">
                <i class="fas fa-address-card"></i>
                @yield('title')
            </div>
            <div class="col-auto mr-auto"></div>
            <div class="col-auto"></div>
        </div>            
    </div>
    <div class="card-body">
        @include('partials._errores')
        <form method="post" action="{{ route('empresas.store') }}">
            @csrf
            <div class="row">
                <div class="form-group col-7">
                    <label for="newempresaname">Nombre</label>
                    <input type="text" class="form-control form-control-sm" id="newempresaname" name="newempresaname" value="{{ old('newempresaname') }}" />
                </div>
                <div class="form-group col">
                    <label for="newempresanif">Nif</label>
                    <input type="text" class="form-control form-control-sm" id="newempresanif" name="newempresanif" value="{{ old('newempresanif') }}"/>
                </div>
                <div class="form-group col">
                    <label for="newempresatipo">Tipo</label>
                    <select class="custom-select custom-select-sm" id="newempresatipo" name="newempresatipo">
                        @foreach ($tipos as $tipo )
                        <option value="{{$tipo->id}}">{{$tipo->tipoempresa}}</option>                                
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="newempresaweb">Dirección</label>
                    <input type="text" class="form-control form-control-sm" name="newempresadireccion" value="{{ old('newempresadireccion') }}" />
                </div>
                <div class="form-group col-1">
                    <label for="newempresacp">C.P.</label>
                    <input type="text" class="form-control form-control-sm" id="newempresacp" name="newempresacp"  value="{{ old('newempresacp') }}"/>
                </div>
                <div class="form-group col-2">
                    <label for="newempresalocalidad">Localidad</label>
                    <input type="text" class="form-control form-control-sm" id="newempresalocalidad" name="newempresalocalidad"  value="{{ old('newempresalocalidad') }}" />
                </div>
                <div class="form-group col-2">
                    <label for="newempresaprovincia">Provincia</label>
                    <select class="custom-select custom-select-sm" id="newempresaprovincia" name="newempresaprovincia">
                        <option value="08">Barcelona</option>                                
                        @foreach ($provincias as $provincia )
                        <option value="{{$provincia->id}}">{{$provincia->name}}</option>                                
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-2">
                    <label for="newempresapais">País</label>
                    <select class="custom-select custom-select-sm" id="newempresapais" name="newempresapais">
                        <option value="ES">ESP-España</option>                                
                        @foreach ($paises as $pais )
                        <option value="{{$pais->id}}">{{$pais->c3}}-{{$pais->name}}</option>                                
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="newempresaemail">Email</label>
                    <input type="text" class="form-control form-control-sm" id="newempresaemail" name="newempresaemail" value="{{ old('newempresaemail') }}"/>
                </div>
                <div class="form-group col">
                    <label for="newempresaweb">Web</label>
                    <input type="text" class="form-control form-control-sm" id="newempresaweb" name="newempresaweb" value="{{ old('newempresaweb') }}" />
                </div>
                <div class="form-group col-1">
                    <label for="newempresatfno">Teléfono</label>
                    <input type="text" class="form-control form-control-sm" id="newempresatfno" name="newempresatfno" value="{{ old('newempresatfno') }}" />
                </div>
                <div class="form-group col-1">
                    <label for="newempresaidioma">Idioma</label>
                    <select class="custom-select custom-select-sm" id="newempresaidioma" name="newempresaidioma">
                        <option value="ES" selected>ES</option>                                
                        <option value="EN">EN</option>                                
                    </select>
                </div>
            </div>
            <div class="row" id="contenido">
                <div class="form-group col">
                    <label for="newempresacuentacontable">Cuenta contable</label>
                    <input type="text" class="form-control form-control-sm" id="newempresacuentacontable" name="newempresacuentacontable" value="{{ old('newempresacuentacontable') }}" />
                </div>
                <div class="form-group col-1">
                    <label for="newempresamarta">% Marta</label>
                    <input type="text" class="form-control form-control-sm" id="newempresamarta" name="newempresamarta" value="{{ old('newempresamarta','100') }}" onchange="cambiaMarta()"/>
                </div>
                <div class="form-group col-1">
                    <label for="newempresasusana">% Susana</label>
                    <input type="text" class="form-control form-control-sm" id="newempresasusana" name="newempresasusana" value="{{ old('newempresasusana','0') }}" onchange="cambiaSusana()"/>
                </div>
                <div class="form-row col">
                    <div class="form-group col">
                        <label for="observaciones" class="display-sm1">Observaciones</label>
                        <textarea name="observaciones" class="form-control form-control-sm" id="observaciones"></textarea>
                    </div>
                </div>
                <input type="text" id="newtotalmartasusana" name="newtotalmartasusana" value="100"/>

            </div>
            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
            <input type="button" class="btn btn-primary" name="Enviar" value="Enviar" onclick="form.submit()">
        </form>
    </div>
</div>
