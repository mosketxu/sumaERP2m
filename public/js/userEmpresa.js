$(document).ready(function(){
    CargarDisp();
    CargarAsoc();
});

function CargarDisp(){
    var empDisp= $("#tEmpDisp");
    var user=$("#userid").html();
    var route = "/erp/userEmpresa/empDisp/"+user;

    $.get(route,function(res){
        // console.log(res);
        $(res).each(function(key,value){
			empDisp.append("<tr id='d"+value.idEmp+"'><td><a href='#'  OnClick='Asociar("+value.idEmp+");'><i class='text-success fas fa-arrow-alt-circle-left fa-fw fa-lg'></i></a></td><td>"+value.empresa+"</td></tr>");
        });
    });
}

function CargarAsoc(){
    var empAsoc= $("#tEmpAsoc");
    var user=$("#userid").html();
    var route = "/erp/userEmpresa/empAsoc/"+user;

    $.get(route,function(res){
        // console.log(res);
        $(res).each(function(key,value){
			empAsoc.append("<tr><td>"+value.empresa+"</td><td><a href='#' id='idAsoc' OnClick='Disponer("+value.idUserEmp+");'><i class='text-danger fas fa-arrow-alt-circle-right fa-fw fa-lg'></i></a></td></tr>");
        });
    });
}


function Asociar(idEmp){
    var user=$("#userid").html();
    var token = $("#token").val();
    var n = $('tr:last td', $("#tablaAsociadas")).length;
    var dato = idEmp;
    
    var route = "/erp/userEmpresa/asoc/"+user+"/"+idEmp;
	$.ajax({
	 	url: route,
	 	headers: {'X-CSRF-TOKEN': token},
	 	type: 'POST',
        dataType: 'json',
        data:{ UserEmpresa: dato},
	 	success: function(data){
            $("#tablaAsociadas").append("<tr><td>"+data.nam+"</td><td><a href='#' OnClick='Disponer("+data.idUserEmp+");'><i class='text-danger fas fa-arrow-alt-circle-right fa-fw fa-lg'></i></a></td></tr>");
            var idn="#d"+data.idEmp
            $(idn).remove()
         },
         error: function(){
             alert('mal');
         }
	});
}
