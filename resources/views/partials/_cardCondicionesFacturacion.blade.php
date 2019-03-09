<div class="card border-primary text-primary my-1">
    <div class="card-header py-0 px-1">
        <div class="form-row mx-105">
            <div class="form-group col-sm-3 my-1 px-1"> 
                <label class="display-sm1">P.Pago</label>
            </div>
            <div class="form-group col-sm-7 my-1 px-1"> 
                <label class="display-sm1">F.Pago</label>
            </div>
            <div class="form-group col-sm-2 my-1 px-1"> 
                <label class="display-sm1">Vto.</label>
            </div>
        </div>
    </div>
    <div class="card-body p-1" id="cardCondFact">
        <div class="form-row mx-105">
            <div class="form-group col-sm-3 my-1 px-1">
                <input type="text" name="ppago" class="form-control-plaintext form-control-sm" id="ppago" value="{{$empresa->condFacturacions->periodopago}}" readonly>
            </div>
            <div class="form-group col-sm-7  my-1 px-1">
                <input type="text" name="fpago" class="form-control-plaintext form-control-sm" id="fpago" value="{{$empresa->condFacturacions->formapago}}" readonly>
            </div>
            <div class="form-group col-sm-2 my-1 px-1">
                <input type="text" name="dvto" class="form-control-plaintext form-control-sm" id="dvto" value="{{$empresa->condFacturacions->diavencimiento}}" readonly>
            </div>
        </div>
    </div>
</div>
