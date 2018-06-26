function peticion(){
    $.ajax({
        url: "Controllers/admin/administradores/busqueda.php",
        type: "POST",
        data: {id: $("#id").val()}
    }).done(function(response){
            var datos = jQuery.parseJSON(response);
            busqueda(datos);
    }).fail(function(){
        $("#resulOk").html("Inserta un Administrador válido").attr("title", "Error en la busqueda");
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
        document.getElementById("resultado").style.visibility = "visible";
        $("#administrador").val(datos.ID);
        $("#contra").val(datos.Password);
        $("#correo").val(datos.Correo);
        // PARA ELIMINAR
        $("#eliminar").click(function(){
            $("#mensaje").html("¿Está usted seguro de que desea borrar los datos?<br>Esta acción no se podrá deshacer");
            $(function(){
                $("#mensaje").dialog({
                    resizable: false,
                    height: "auto",
                    width: "auto",
                    modal: true,
                    buttons: {
                        "Eliminar": function() {
                            $.ajax({
                                url: "Controllers/admin/administradores/borrar.php",
                                type: "POST",
                                data: {id: $("#administrador").val()}
                            }).done(function(response){
                                if(response == 1) {
                                    $("#resultado").attr("style", "visibility:hidden");
                                    $(function(){
                                        $("#resulOk").html("Borrado realizado con éxito").attr("title", "Realizado");
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
        // PARA MODIFICAR
        $("#modificar").click(function() {
            $("#mensaje").html("¿Está usted seguro de que desea modificar los datos?<br>Esta acción no se podrá deshacer");
            $(function(){
                $("#mensaje").dialog({
                    resizable: false,
                    height: "auto",
                    width: "auto",
                    modal: true,
                    buttons: {
                        "Modificar": function() {
                            $.ajax({
                                url: "Controllers/admin/administradores/modificar.php",
                                type: "POST",
                                data: {
                                    id: $("#id").val(),
                                    administrador: $("#administrador").val(),
                                    contra: $("#contra").val(),
                                    tipo: "1",
                                    correo: $("#correo").val()
                                }
                            }).done(function(response){
                                if(response == 1){
                                    $("#resultado").attr("style", "visibility:hidden");
                                    $(function(){
                                        $("#resulOk").html("Modificación realizada con éxito").attr("title", "Realizada");
                                        $("#resulOk").dialog({
                                            modal: true,
                                            buttons: {
                                                Aceptar: function(){
                                                    $(this).dialog("close");
                                                }
                                            }
                                        });
                                    });
                                    document.getElementById("id").value = null;
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
        $(function(){
            $("#resultado").attr("style", "visibility:hidden");
            $("#resulOk").html("Inserta un Administrador válido").attr("title", "Error en la busqueda");
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
}
$(document).ready(function(){
    $("#buscar").click(peticion);
});