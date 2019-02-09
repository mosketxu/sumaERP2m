<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Actualizar genero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">
                <input type="hidden" id="id">
                @include('genero.form.genero')
            </div>
            <div class="modal-footer">
                <a href="#" class="href"  class="btn btn-primary" id="actualizar">Actualizar</a>
            </div>
        </div>
    </div>
</div>