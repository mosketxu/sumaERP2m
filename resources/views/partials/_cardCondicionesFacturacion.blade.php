<div class="card border-primary text-primary my-1">
    <div class="card-header py-0 px-1">
        <div class="form-row mx-105">
            <div class="form-group col my-1 px-1"> 
                <label class="display-sm1">Periodo de Pago</label>
            </div>
            <div class="form-group col my-1 px-1 "> 
                <label class="display-sm1">Forma de Pago</label>
            </div>
            <div class="form-group col my-1 px-1"> 
                <label class="display-sm1">Día Vencimiento</label>
            </div>
            <div class="form-group col-1  my-1 px-1 text-center">
                <label class="display-sm1">Op.</label>
            </div>
        </div>
    </div>
    <div class="card-body p-1" id="cardCondFact">
        <div class="form-row mx-105">
            <div class="form-group col my-1 px-1">
                <input type="text" name="ppago" class="form-control-plaintext form-control-sm" id="ppago" value="{{$empresa->condFacturacions->periodopago}}" readonly>
            </div>
            <div class="form-group col  my-1 px-1">
                <input type="text" name="fpago" class="form-control-plaintext form-control-sm" id="fpago" value="{{$empresa->condFacturacions->formapago}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="dvto" class="form-control-plaintext form-control-sm" id="dvto" value="{{$empresa->condFacturacions->diavencimiento}}" readonly>
            </div>
            <div class="form-group col-1 my-1 px-1 text-right">
                {{-- <i class="far fa-eye text-muted"></i> --}}
                <a href="{{route('condfact.edit',$empresa->condFacturacions->id) }}"  title="Edit"><i class="far fa-edit text-primary"></i></a>
                <a href="{{route('condfact.destroy',$empresa->condFacturacions->diavencimiento)}}" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
            </div>
        </div>
    </div>
</div>
