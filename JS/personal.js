// Petición de busqueda de personal //

function peticion(){
    $.ajax({
        url: "Controllers/user/personal.php?accion=busqueda",
        type: "POST",
        data: {id: $("#id").val()}
    }).done(function (response){
        console.log(response)
        var datos = jQuery.parseJSON(response);
        busqueda(datos);
    }).fail(function() {
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
    })
}
// 
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
                $("#HE-26").attr("checked", "checked");
            } else {
                $("#HE-26").removeAttr("checked");
            }
            if($.inArray('HT-17', cursos) >= 0){
                $("#HT-17").attr("checked", "checked");
            } else {
                $("#HT-17").removeAttr("checked");
            }
            if($.inArray('HR-12', cursos) >= 0){
                $("#HR-12").attr("checked", "checked");
            } else {
                $("#HR-12").removeAttr("checked");
            }
            if($.inArray('HU-10', cursos) >= 0){
                $("#HU-10").attr("checked", "checked");
            } else {
                $("#HU-10").removeAttr("checked");
            }
        });
        $("#borrar").click(function(){
            $("#mensaje").html("¿Está usted seguro de que desea dar de borrar esta persona?");
            $(function(){
                $("#mensaje").dialog({
                    resizable: false,
                    height: "auto",
                    width: "auto",
                    modal: true,
                    buttons: {
                        "Borrar": function(){
                            if(cursos.length > 0){
                                $.ajax({
                                    url: "index.php?opcion=personal&accion=borrar",
                                    type: "post",
                                    data: {dni:datos.dni}
                                })
                            }
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