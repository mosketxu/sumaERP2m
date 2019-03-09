<div class="card border-success text-success my-1">
    <div class="card-header py-0 px-1">
        <div class="form-row mx-105">
            <div class="form-group col-sm-3 my-1 px-1">
                <label class="display-sm1 "><a data-toggle="collapse" href="#datosOcultosBanco"><i class="fas fa-plus-circle text-success"></i></a> Banco</label>
            </div>
            <div class="form-group col-sm-8  my-1 px-1 ">
                <label class="display-sm1">Iban</label>
            </div>
            <div class="form-group col-sm-1  my-1 px-1 ">
                <label  class="display-sm1"></label>
            </div>
        </div>
    </div>
    <div class="card-body p-1" id="cardBancos">
    @foreach ($empresa->bancos as $banco)
        @if($banco->principal===1)
        <div class="form-row bg-activo mx-105">
        @else
        <div class="form-row mx-105">
        @endif
            <div class="form-group col-sm-3 my-1 px-1">
                <input type="text" name="banco{{$banco->id}}" class="form-control-plaintext form-control-sm" id="banco{{$banco->id}}" value="{{$banco->bank}}" readonly>
            </div>
            <div class="form-group col-sm-8 my-1 px-1">
                <input type="text" name="iban{{$banco->id}}" class="form-control-plaintext form-control-sm" id="iban{{$banco->id}}" value="{{$banco->iban}}" readonly>
            </div>
            <div class="form-group col-sm-1 my-1 px-1">
                @if($banco->estado===0)
                <i class="fas fa-circle text-danger fa-xs"></i>
                @elseif($banco->estado===1)
                <i class="fas fa-circle text-success fa-xs"></i>
                @else
                <i class="fas fa-circle text-warning fa-xs"></i>
                @endif
            </div>
        </div>
        {{-- Oculto --}}
        <div class="collapse" id="datosOcultosBanco">
            <hr>
            <div class="form-row  mx-105">
                <div class="form-group col-sm-12">
                    <label for="bancoobs{{$banco->id}}" class="display-sm1">Observaciones</label>
                    <input type="text" name="bancoobs{{$banco->id}}" class="form-control form-control-sm" id="bancoobs{{$banco->id}}" value="{{$banco->observaciones}}" readonly>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

