function peticion(){
    $.ajax({
        url: "Controllers/admin/usuarios/busqueda.php",
        type: "POST",
        data: {id: $("#id").val()}
    }).done(function(response){
        var datos = jQuery.parseJSON(response);
        busqueda(datos);
    }).fail(function(){
        $("#resulOk").html("Inserta un Usuario Válido").attr("title", "Error en la busqueda");
        $("#resulOk").dialog({
            modal: true,
            buttons: {
                Aceptar: function(){
                    $(this).dialog("close");
                }
            }
        });
        $("#id").val("");
    })
   }
    
    
    $(document).ready(function(){
    $("#buscar").click(peticion);
});