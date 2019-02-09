$(document).ready(function(){
    var tablaDatos= $("#datos");
    var route = "https://sumaerp2m.dev/erp/generos";

    $.get(route,function(res){
        $(res).each(function(key,value){
            tablaDatos.append("<tr><td>"+value.genre+"</td><td><button class='btn btn-primary'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
        });
    });
});
