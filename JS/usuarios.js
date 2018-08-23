function peticion(){
    $.ajax({
        url: "Controllers/admin/usuarios/busqueda.php",
        type: "POST",
        data: {accion: "busqueda",
            id: $("#id").val()}
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
if (datos != null){
$("#resultado").attr("style", "dysplay: block");
        $("#usuario").val(datos.ID);
        $("#contra").val(datos.Password);
        $("correo").val(datos.Correo);
        //Para eliminar
        $("eliminar").click(function(){
        $("#mensaje").html("¿Está usted seguro de que desea borrar los datos?<br>Esta acción no se podrá deshacer");
        $(function(){
        $("#mensaje").dialog({
                resizable: false,
                height: "auto",
                width: "auto",
                modal: true,
                buttons: {
                "Eliminar": function(){
                    $ajax({
                        url: "Controllers/admin/usuarios/usuarios.php",
                        type: "POST",
                        data: {accion: "borrar",
                                id: $("#usuario").val()}
                }).done(function(response){
                if (response = 1){
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

        //Para modificar
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
                                url: "Controllers/admin/usuarios/usuarios.php",
                                type: "POST",
                                data: { accion: "modificar",
                                    id: $("#id").val(),
                                    usuario: $("#usuario").val(),
                                    contra: $("#contra").val(),
                                    tipo: "2",
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
            $("#resultado").removeAttr("style");
            $("#resulOk").html("Inserta un usuario válido").attr("title", "Error en la busqueda");
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
        


