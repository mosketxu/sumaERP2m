@extends('layouts.erp')

@section('title','Crear genero')

@section('content')
    <form method="POST" action="">
        {{-- {{ method_field('PUT') }} --}}
        {{-- {{ csrf_field() }} --}}
        <div class="alert alert-success alert-dissmisible" id="msj-success" role="alert" style="display:none">
            <strong>Todo OK</strong>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">
        @include('genero.form.genero')
        <a href="#" class="btn btn-primary" id="registro">Registrar</a>

    </form>

@endsection

@section('scriptsextra')
    <script>
    $("#registro").click(function() {
        var dato = $("#genre").val();
        var route = "https://sumaerp2m.dev/genero";
        var token = $("#token").val();

        $.ajax({
            url: route,
            headers: { "X-CSRF-TOKEN": token },
            type: "POST",
            dataType: "json",
            data: { genre: dato },
            success: function() {
                $("#msj-success").fadeIn();
            }
        });
    });
</script>
@endsection
