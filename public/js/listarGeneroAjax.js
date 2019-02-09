$(document).ready(function(){
    Cargar();
});

function Cargar(){
    var tablaDatos= $("#datos");
    // var route = "https://sumaerp2m.dev/erp/generos";
    // var route = "http://localhost:8000/erp/generos";
    var route = "/erp/generos";
    

    $("#datos").empty();

    $.get(route,function(res){
        $(res).each(function(key,value){
			tablaDatos.append("<tr><td>"+value.genre+"</td><td><button value="+value.id+" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this);'>Eliminar</button></td></tr>");
        });
    });
}

function Mostrar(btn){
    console.log(btn.value);
    
    // var route = "https://sumaerp2m.dev/erp/genero/"+btn.value+"/edit";
    // var route = "http://127.0.0.1:8000/erp/genero/"+btn.value+"/edit";
    var route = "/erp/genero/"+btn.value+"/edit";

    
    $.get(route,function(res){
        $("#genre").val(res.genre);
        $("#id").val(res.id);
    });
}

$("#actualizar").click(function(){
    var value=$("#id").val();
    var dato=$("#genre").val();
    // var route = "https://sumaerp2m.dev/erp/genero/"+value+"";
    // var route = "http://127.0.0.1:8000/erp/genero/"+value+"";
    var route = "/erp/genero/"+value+"";
    
    var token=$("#token").val();

    $.ajax({
        url:route,
        headers:{'X-CSRF-TOKEN':token},
        type:'PUT',
        dataType:'json',
        data:{genre:dato},
        success:function(){
            Cargar();
            $("#id").val("");
            $("#genre").val("");
            $("#myModal").modal('toggle');
            $("#msj-success").fadeIn();
        }
    });
});