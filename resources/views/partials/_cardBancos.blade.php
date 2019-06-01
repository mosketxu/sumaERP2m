<div class="card  text-white my-1">
    <div class="card-header bg-success py-0 px-1">
        <div class="form-row mx-105">
            <div class="form-group col-1  my-1 px-1 ">
                <label class="display-sm1 ">Principal</label>
            </div>
            <div class="form-group col my-1 px-1">
                <label class="display-sm1 ">Bancos</label>
            </div>
            <div class="form-group col  my-1 px-1 ">
                <label class="display-sm1">Iban</label>            
            </div>
            <div class="form-group col  my-1 px-1 ">
                <label class="display-sm1">Observaciones</label>
            </div>
            <div class="form-group col-1  my-1 px-1  text-right">
                <label class="display-sm1">Est. &nbsp; &nbsp; Op. &nbsp; &nbsp; </label>
            </div>
        </div>
    </div>
    <div class="card-body p-1" id="cardBancos">
    @foreach ($empresa->bancos as $banco)
        <div class="form-row mx-105">
            <div class="form-group col-1 my-1 px-1">
                @if($banco->principal===1)
                &nbsp; &nbsp; <i class="fas fa-star  text-success"></i>
                @else
                <i class="far fa-star text-success"></i>
                @endif
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="banco{{$banco->id}}" class="form-control-plaintext form-control-sm" id="banco{{$banco->id}}" value="{{$banco->bank}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="iban{{$banco->id}}" class="form-control-plaintext form-control-sm" id="iban{{$banco->id}}" value="{{$banco->iban}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="bancoobs{{$banco->id}}" class="form-control-plaintext form-control-sm" id="bancoobs{{$banco->id}}" value="{{$banco->observaciones}}" readonly>
            </div>
            <div class="form-group col-1 my-1 px-1 text-right">
                @if($banco->estado===0)
                    <i class="fas fa-circle text-danger fa-xs"></i>
                @elseif($banco->estado===1)
                    <i class="fas fa-circle text-success fa-xs"></i>
                @else
                    <i class="fas fa-circle text-warning fa-xs"></i>
                @endif
                &nbsp;&nbsp;
                <a href="{{route('banco.edit',$banco->id) }}"  title="Edit"><i class="far fa-edit text-primary"></i></a>
                <a href="{{route('banco.destroy',$banco->id)}}" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
            </div>
        </div>
        @endforeach
    </div>
</div>

