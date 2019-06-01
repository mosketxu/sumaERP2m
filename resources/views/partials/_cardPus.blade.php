<div class="card text-white  my-1">
    <div class="card-header bg-warning py-0 px-1">
        <div class="form-row mx-105">
            <div class="form-group col  my-1 px-1">
                <label class="display-sm1">Url</label>
            </div>
            <div class="form-group col  my-1 px-1">
                <label class="display-sm1">Ce</label>
            </div>
            <div class="form-group col  my-1 px-1 ">
                <label class="display-sm1">Us</label>
            </div>
            <div class="form-group col  my-1 px-1">
                <label class="display-sm1">Pu</label>
            </div>

            <div class="form-group col-2  my-1 px-1  text-right">
                <label class="display-sm1">Est. &nbsp; &nbsp; Op. &nbsp; &nbsp;</label>
            </div>
        </div>
    </div>
    <div class="card-body p-1" id="cardBancos">
    @foreach ($pus as $pu)
        <div class="form-row mx-105">
            <div class="form-group col my-1 px-1">
                <input type="text" name="puurl{{$pu->id}}" class="form-control-plaintext form-control-sm" id="puurl{{$pu->url}}" value="{{$pu->url}}" readonly>
            </div>
            <div class="form-group col my-1 px-1 ">
                <input type="text" name="puce{{$pu->id}}" class="form-control-plaintext form-control-sm" id="puce{{$pu->ce}}" value="{{$pu->ce}}" readonly>
            </div>
            <div class="form-group col my-1 px-1">
                <input type="text" name="puus{{$pu->id}}" class="form-control-plaintext form-control-sm" id="puus{{$pu->us}}" value="{{$pu->us}}" readonly>
            </div>
            <div class="form-group col my-1 px-1 ">
                <input type="text" name="pupw{{$pu->id}}" class="form-control-plaintext form-control-sm" id="pucpw{{$pu->pw}}" value="{{$pu->pw}}" readonly>
            </div>
            <div class="form-group col-2 my-1 px-1 text-right">
                @if($pu->estado===0)
                    <i class="fas fa-circle text-danger fa-xs"></i>
                @elseif($pu->estado===1)
                    <i class="fas fa-circle text-success fa-xs"></i>
                @else
                    <i class="fas fa-circle text-warning fa-xs"></i>
                @endif
                &nbsp;&nbsp;
                <a href="{{route('pu.edit',$pu->id) }}"  title="Edit"><i class="far fa-edit text-primary"></i></a>
                <a href="{{route('pu.destroy',$pu->id)}}" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
            </div>
        </div>
        @endforeach
    </div>
</div>

