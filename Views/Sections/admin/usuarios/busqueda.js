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

function busqueda(datos){
    if(datos != null){
        $("#resultado").attr("style", "display:block");
        $("#usuario").val(datos.ID);
        $("#contra").val(datos.Password);
        $("#correo").val(datos.Correo);
        
        $("#eliminar").click(function()){
            $("#mensaje").html("¿Está seguro de que desea borrar los datos?<br>Esta accion no se podrá deshacer");
            $(function(){
                $("#mensaje").dialog({
                    resizable: false,
                    height: "auto",
                    width: "auto",
                    modal: true,
                    buttons: {
                        "Eliminar": function() {
                            $.ajax({
                                url: "Controllers/admin/usuarios/borrar.php",
                            })
                        }
                    }
                });
            }
        }
    }
}

$(document).ready(function(){
    $("#buscar").click(peticion);
});