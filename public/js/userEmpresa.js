$(document).ready(function() {
    CargarDisp();
    CargarAsoc();
});

function CargarDisp() {
    var empDisp = $("#tEmpDisp");
    var user = $("#userid").html();
    var route = "/erp/userEmpresa/empDisp/" + user;

    $.get(route, function(res) {
        // console.log(res);
        $(res).each(function(key, value) {
            empDisp.append(
                "<tr id='d" +
                    value.idEmp +
                    "'><td class='text-left'><a href='#'  OnClick='Asociar(" +
                    value.idEmp +
                    ");'><i class='text-success fas fa-arrow-alt-circle-left fa-lg'></i></a></td><td>" +
                    value.empresa +
                    "</td></tr>"
            );
        });
    });
}

function CargarAsoc() {
    var empAsoc = $("#tEmpAsoc");
    var user = $("#userid").html();
    var route = "/erp/userEmpresa/empAsoc/" + user;

    $.get(route, function(res) {
        // console.log(res);
        $(res).each(function(key, value) {
            empAsoc.append(
                "<tr id='a" +
                    value.idUserEmp +
                    "'><td>" +
                    value.empresa +
                    "</td><td  class='text-right'><a href='#' id='idAsoc' OnClick='Disponer(" +
                    value.idUserEmp +
                    "," +
                    value.idEmp +
                    ");'><i class='text-danger fas fa-arrow-alt-circle-right fa-fw fa-lg'></i></a></td></tr>"
            );
        });
    });
}

function Asociar(idEmp) {
    var user = $("#userid").html();
    var token = $("#token").val();

    var route = "/erp/userEmpresa/asoc";
    $.ajax({
        url: route,
        headers: { "X-CSRF-TOKEN": token },
        type: "POST",
        dataType: "json",
        data: { empresaId: idEmp, userId: user },
        success: function(data) {
            console.log(data);
            $("#tablaAsociadas").prepend(
                "<tr id='a" +
                    data.idUserEmp +
                    "'><td class='text-success'>" +
                    data.nam +
                    "</td><td  class='text-right'><a href='#' OnClick='Disponer(" +
                    data.idUserEmp +
                    "," +
                    idEmp +
                    ");'><i class='text-danger fas fa-arrow-alt-circle-right fa-fw fa-lg'></i></a></td></tr>"
            );
            var idn = "#d" + idEmp;
            $(idn).remove();
        },
        error: function(msj) {
            // alert(msj.responseJSON.errors.empresaId);
            // console.log($errors);
        }
    });
}

function Disponer(idUserEmp, idEmp) {
    var user = $("#userid").html();
    var token = $("#token2").val();

    var route = "/erp/userEmpresa/disp";

    $.ajax({
        url: route,
        headers: { "X-CSRF-TOKEN": token },
        type: "delete",
        dataType: "json",
        data: { userEmpId: idUserEmp, empresaId: idEmp, userId: user },
        success: function(data) {
            $("#tablaDisponibles").prepend(
                "<tr id='d" +
                    idEmp +
                    "'><td  class='text-left'><a href='#'  OnClick='Asociar(" +
                    idEmp +
                    ");'><i class='text-success fas fa-arrow-alt-circle-left fa-fw fa-lg'></i></a></td><td class='text-danger'>" +
                    data.nam +
                    "</td></tr>"
            );
            var idn = "#a" + idUserEmp;
            $(idn).remove();
        },
        error: function() {
            alert(
                "Ha habido un error. Inténtelo de nuevo y si persiste comuníquelo al administrador."
            );
            console.log(data);
        }
    });
}
