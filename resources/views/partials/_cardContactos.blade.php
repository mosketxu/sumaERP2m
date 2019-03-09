<div class="card border-secondary text-secondary my-1">
    <div class="card-header py-0 px-1">
        <div class="form-row mx-105">
                <div class="form-group col-sm-4 my-1 px-1">
                    <label class="display-sm1 "><a data-toggle="collapse" href="#datosOcultosContacto"><i class="fas fa-plus-circle text-secondary"></i></a> Contacto</label>
                </div>
                <div class="form-group col-sm-3  my-1 px-1 ">
                    <label class="display-sm1">Tfno 1</label>
                </div>
                <div class="form-group col-sm-4  my-1 px-1 ">
                    <label class="display-sm1">Email 1</label>
                </div>
                <div class="form-group col-sm-1  my-1 px-1 ">
                    <label  class="display-sm1"></label>
                </div>
        </div>
    </div>
    <div class="card-body p-1" id="cardContactos">
    @foreach ($empresa->contactos as $contacto)
        <div class="form-row mx-105">
            <div class="form-group col-sm-4 my-1 px-1">
                <input type="text" name="contactoName{{$contacto->id}}" class="form-control-plaintext form-control-sm" id="contactoName{{$contacto->id}}" value="{{$contacto->name}} {{$contacto->lastname}}" readonly>
            </div>
            <div class="form-group col-sm-3 my-1 px-1">
                <input type="text" name="contactoTfno1{{$contacto->id}}" class="form-control-plaintext form-control-sm" id="contactoTfno1{{$contacto->id}}" value="{{$contacto->telefono1}}" readonly>
            </div>
            <div class="form-group col-sm-4 my-1 px-1">
                <input type="text" name="contactoEmail1{{$contacto->id}}" class="form-control-plaintext form-control-sm" id="contactoEmail1{{$contacto->id}}" value="{{$contacto->email1}}" readonly>
            </div>
            <div class="form-group col-sm-1 my-1 px-1">
                @if($contacto->estado===0)
                <i class="fas fa-circle text-danger fa-xs"></i>
                @elseif($contacto->estado===1)
                <i class="fas fa-circle text-success fa-xs"></i>
                @else
                <i class="fas fa-circle text-warning fa-xs"></i>
                @endif
            </div>
            {{-- Oculto --}}
        </div>
        <div class="collapse" id="datosOcultosContacto">
            <div class="form-row  mx-105">
                <div class="form-group col-sm-6">
                    <label for="contactoTfno2{{$contacto->id}}" class="display-sm1">Tfno2</label>
                    <input type="text" name="contactoTfno2{{$contacto->id}}" class="form-control form-control-sm" id="contactoTfno2{{$contacto->id}}" value="{{$contacto->telefono2}}" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label for="contactoEmail2{{$contacto->id}}" class="display-sm1">Email 2</label>
                    <input type="text" name="contactoEmail2{{$contacto->id}}" class="form-control form-control-sm" id="contactoEmail2{{$contacto->id}}" value="{{$contacto->emmail2}}" readonly>
                </div>
            </div>
            <div class="form-row mx-105">
                <div class="form-group col-sm-2">
                    <label for="contactoEstado{{$contacto->id}}" class="display-sm1">Estado</label>
                    <input type="text" name="contactoEstado{{$contacto->id}}" class="form-control form-control-sm" id="contactoEstado{{$contacto->id}}" value="{{$contacto->estado}}" readonly>
                </div>
                <div class="form-group col-sm-10">
                    <label for="contactoObservaciones{{$contacto->id}}" class="display-sm1">Observaciones</label>
                    <textarea name="contactoObservaciones{{$contacto->id}}" class="form-control form-control-sm" id="contactoObservaciones{{$contacto->id}}">{{$contacto->observaciones}}</textarea>
                </div>
            </div>
            <hr>
            <div class="form-row mx-105">
                    <div class="form-group col-sm-4 my-1 px-1">
                        <label class="display-sm1 "><a data-toggle="collapse" href="#datosOcultosContacto"><i class="fas fa-plus-circle text-secondary"></i></a> Contacto</label>
                    </div>
                    <div class="form-group col-sm-3  my-1 px-1 ">
                        <label class="display-sm1">Tfno 1</label>
                    </div>
                    <div class="form-group col-sm-4  my-1 px-1 ">
                        <label class="display-sm1">Email 1</label>
                    </div>
                    <div class="form-group col-sm-1  my-1 px-1 ">
                        <label  class="display-sm1"></label>
                    </div>
            </div>
        </div>
    @endforeach
    </div>
</div>


