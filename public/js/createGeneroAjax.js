$("#registro").click(function() {
    var dato = $("#genre").val();
    // var route = "https://sumaerp2m.dev/erp/genero";
    // var route = "http://127.0.0.1:8000/erp/genero";
    var route = "/erp/genero";
    
    var token = $("#token").val();

    $.ajax({
        url: route,
        headers: { "X-CSRF-TOKEN": token },
        type: "POST",
        dataType: "json",
        data: { genre: dato },
        success: function() {
            $("#msj-success").fadeIn();
        },
        error: function(msj){ 
            console.log(msj.responseJSON.errors.genre);
            $("#msj").html(msj.responseJSON.errors.genre);
            $("#msj-error").fadeIn();
        }
    });
});
