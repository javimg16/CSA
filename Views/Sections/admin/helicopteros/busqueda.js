function peticion(){
    $.ajax({
        url: "Controllers/admin/helos/busqueda.php",
        type: "POST",
        data: {id: $("#id").val()}
    }).done(function (response){
        var datos = jQuery.parseJSON(response);
        busqueda(datos);
    }).fail(function() {
        $("#resultado").removeAttr("sytle");
        $("#resulOk").html("Inserta un Helicóptero válido").attr("title", "Error en la busqueda");
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
    if(datos.modelo != null){
        $("#resultado").attr("style", "display: block");
        $("#matricula").val(datos.matricula);
        $("#modelo").val(datos.modelo);
        $("#fecAlta").val(datos.fecAlta);
        if(datos.simulador == "1") {
            $("#simulador").attr("checked", "checked");
        } else {
            $("#simulador").removeAttr("checked");
        }
        $("#fecBaja").val(datos.fecBaja);
        // PARA DAR DE BAJA
        $("#baja").click(function(){
           $("#mensaje").html("¿Está usted seguro de que desea dar de baja el Helicópteros?");
           $(function(){
               $("#mensaje").dialog({
                    resizable: false,
                    height: "auto",
                    width: "auto",
                    modal: true,
                    buttons: {
                        "Dar de Baja": function() {
                            $.ajax({
                                url: "Controllers/admin/helos/baja.php",
                                type: "POST",
                                data: {id: $("#matricula").val(),
                                    fecBaja: $("#fecBaja").val()}
                            }).done(function(response){
                                if(response == 1) {
                                    $("#resultado").removeAttr("style");
                                    $(function(){
                                        $("#resulOk").html("Baja realizada con éxito").attr("title", "Realizada");
                                        $("#resulOk").dialog({
                                            modal: true,
                                            buttons: {
                                                Aceptar: function(){
                                                    $(this).dialog("close");
                                                }
                                            }
                                        });
                                    });
                                    $("#id").val("");
                                }
                            })
                            $(this).dialog("close");
                        }, 
                        Cancel: function(){
                            $(this).dialog("close");
                        }
                    }                        
                });
           });
        });
    } else { 
        $("#resultado").removeAttr("style");
        $("#resulOk").html("Inserta un Helicóptero válido").attr("title", "Error en la busqueda");
        $("#resulOk").dialog({
            modal: true,
            buttons: {
                Aceptar: function(){
                    $(this).dialog("close");
                }
            }
        });
        $("#id").val("");
    }
}


$(document).ready(function(){
    $("#buscar").click(peticion);
});