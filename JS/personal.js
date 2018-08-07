// Petición de busqueda de personal //

function peticion(){
    $.ajax({
        url: "Controllers/user/personal.php?accion=busqueda",
        type: "POST",
        data: {id: $("#id").val()}
    }).done(function (response){
        var datos = jQuery.parseJSON(response);
        busqueda(datos);
    }).fail(function() {
        $("#resultado").removeAttr("style");
        $("#resulOk").html("Error en la Conexion con el servidor").attr("title", "Error en la busqueda");
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
// Funcion de busqueda
function busqueda(datos){
    var cursos;
    if(datos.nombre != null){
        $("#resultado").attr("style", "display: block");
        $("#dni").val(datos.dni);
        $("#nombre").val(datos.nombre);
        $("#apellidos").val(datos.apellidos);
        $("#fecAlta").val(datos.fecAlta);
        $("#funcion").val(datos.funcion);
        $.ajax({
            url: "Controllers/user/personal.php?accion=modelos",
            type: "POST",
            data: {dni: datos.dni}
        }).done(function (response){
            cursos = jQuery.parseJSON(response);
            if($.inArray('HE-26', cursos) >= 0){
                $("#HE-26").prop('checked', true);
            } else {
                $("#HE-26").prop('checked', false);
            }
            if($.inArray('HT-17', cursos) >= 0){
                $("#HT-17").prop('checked', true);
            } else {
                $("#HT-17").prop('checked', false);
            }
            if($.inArray('HR-12', cursos) >= 0){
                $("#HR-12").prop('checked', true);
            } else {
                $("#HR-12").prop('checked', false);
            }
            if($.inArray('HU-10', cursos) >= 0){
                $("#HU-10").prop('checked', true);
            } else {
                $("#HU-10").prop('checked', false);
            }
        });
        $("#borrar").click(function(){
            $("#mensaje").html("¿Está usted seguro de que desea dar de BORRAR esta persona?");
            $(function(){
                $("#mensaje").dialog({
                    resizable: false,
                    height: "auto",
                    width: "auto",
                    modal: true,
                    buttons: {
                        "Dar de baja": function(){
                            if(cursos.length > 0){
                                $.ajax({
                                    url: "Controllers/user/personal.php?accion=borrar",
                                    type: "post",
                                    data: {dni:datos.dni, 
                                        tieneCursos: true}
                                }).done(function(response){
                                    console.log(response);
                                    if(response == 1){
                                        $("#resultado").removeAttr("style");
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
                            } else {
                                $.ajax({
                                    url: "Controllers/user/personal.php?accion=borrar",
                                    type: "post",
                                    data: {dni:datos.dni, 
                                        tieneCursos: false}
                                }).done(function(response){
                                    if(response == 1){
                                        $("#resultado").removeAttr("style");
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
                            }
                        },
                        Cancel: function(){
                            $(this).dialog("close");
                        }
                    }
                })
            })
        });
        $("#modificar").click(function(){
            $("#mensaje").html("¿Está usted seguro de que desea dar de MODIFICAR esta persona?");
            $(function(){
                $("#mensaje").dialog({
                    resizable: false,
                    height: "auto",
                    width: "auto",
                    modal: true,
                    buttons: {
                        "Modificar": function(){
                            $.ajax({
                                url: "Controllers/user/personal.php?accion=modificar",
                                type: "POST",
                                data: {dni:$("#dni").val(),
                                    nombre:$("#nombre").val(),
                                    apellidos:$("#apellidos").val(),
                                    fecAlta:$("#fecAlta").val(),
                                    funcion:$("#funcion").val(),
                                    modelo1:$("#HE-26").is(":checked"),
                                    modelo2:$("#HR-12").is(":checked"),
                                    modelo3:$("#HT-17").is(":checked"),
                                    modelo4:$("#HU-10").is(":checked"),
                                }
                            }).done(function(response){
                                console.log(response);
                                $("#resultado").removeAttr("style");
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
                                $("#id").val("");
                            })
                        $(this).dialog("close");
                        }
                    }
                })
            })
        })
    } else {
        $("#resultado").removeAttr("style");
        $("#resulOk").html("Inserta un DNI válido").attr("title", "Error en la busqueda");
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