<div class="card text-white my-1">
    <div class="card-header bg-secondary py-0 px-1">
        <div class="form-row mx-105">
                <div class="form-group col my-1 px-1">
                    <label class="display-sm1 "><a data-toggle="collapse" href="#datosOcultosContacto"><i class="fas fa-plus-circle text-white"></i></a> Contactos</label>
                </div>
                <div class="form-group col  my-1 px-1 ">
                    <label class="display-sm1">Email 1</label>
                </div>
                <div class="form-group col  my-1 px-1 ">
                    <label class="display-sm1">Email 2</label>
                </div>
                <div class="form-group col  my-1 px-1 ">
                    <label class="display-sm1">Tfno 1</label>
                </div>
                <div class="form-group col  my-1 px-1  ">
                    <label class="display-sm1">Tfno 2</label>
                </div>
                <div class="form-group col  my-1 px-1  ">
                    <label class="display-sm1">Dpto.</label>
                </div>
                <div class="form-group col-1  my-1 px-1 text-center">
                    <label class="display-sm1">Op.</label>
                </div>
        </div>
    </div>
    <div class="card-body p-1" id="cardContactos">
    @foreach ($contactos as $contacto)
        <div class="form-row mx-105">
            <div class="form-group col my-1 px-1">
                <input type="text" name="contactoName{{$contacto->id}}" class="form-control-plaintext form-control-sm " id="contactoName{{$contacto->id}}" value="{{$contacto->name}} {{$contacto->lastname}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="contactoEmail1{{$contacto->id}}" class="form-control-plaintext form-control-sm " id="contactoEmail1{{$contacto->id}}" value="{{$contacto->email1}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="contactoEmail2{{$contacto->id}}" class="form-control-plaintext form-control-sm" id="contactoEmail1{{$contacto->id}}" value="{{$contacto->email2}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="contactoTfno1{{$contacto->id}}" class="form-control-plaintext form-control-sm " id="contactoTfno1{{$contacto->id}}" value="{{$contacto->telefono1}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="contactoTfno2{{$contacto->id}}" class="form-control-plaintext form-control-sm " id="contactoTfno1{{$contacto->id}}" value="{{$contacto->telefono2}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="departamento{{$contacto->id}}" class="form-control-plaintext form-control-sm " id="departamento{{$contacto->id}}" value="{{$contacto->departamento->departamento}}" readonly>
            </div>
            <div class="form-group col-1 my-1 px-1 text-right">
                @if($contacto->estado===0)
                <i class="fas fa-circle text-danger fa-xs"></i>
                @elseif($contacto->estado===1)
                <i class="fas fa-circle text-success fa-xs"></i>
                @else
                <i class="fas fa-circle text-warning fa-xs"></i>
                @endif
                &nbsp;&nbsp;
                <a href="{{route('condfact.edit',$contacto->slug) }}"  title="Edit"><i class="far fa-edit text-primary"></i></a>
                <a href="{{route('condfact.destroy',$contacto->id)}}" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
            </div>

            {{-- Oculto --}}
        </div>
        <div class="collapse" id="datosOcultosContacto">
            <div class="form-row mx-105">
                <div class="form-group col">
                    <label for="contactoObservaciones{{$contacto->id}}" class="display-sm1 text-secondary">Observaciones</label>
                    <textarea name="contactoObservaciones{{$contacto->id}}" class="form-control form-control-sm" id="contactoObservaciones{{$contacto->id}}">{{$contacto->observaciones}}</textarea>
                </div>
            </div>

            @unless ($loop->last)
                <hr>
                <div class="form-row bg-secondary mx-105">
                    <div class="form-group col-2 my-1 px-1">
                        <label class="display-sm1 "><a data-toggle="collapse" href="#datosOcultosContacto"><i class="fas fa-plus-circle text-white"></i></a> Contacto</label>
                    </div>
                    <div class="form-group col-2  my-1 px-1 ">
                        <label class="display-sm1">Tfno 1</label>
                    </div>
                    <div class="form-group col-2  my-1 px-1 ">
                        <label class="display-sm1">Email 1</label>
                    </div>
                    <div class="form-group col-2  my-1 px-1 ">
                        <label class="display-sm1">Tfno 2</label>
                    </div>
                    <div class="form-group col-2  my-1 px-1 ">
                        <label class="display-sm1">Email 2</label>
                    </div>
                    <div class="form-group col-1  my-1 px-1 ">
                        <label class="display-sm1">Estado</label>
                    </div>
                    <div class="form-group col-1  my-1 px-1 ">
                        <label class="display-sm1">Op.</label>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
    </div>
</div>


