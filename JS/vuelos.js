// Funcion de fallo de Conexion
var fallo = function(){
    $("#resulOk").html("Fallo en la conexion con el Servidor").attr("title", "ERROR");
    $("#resulOk").dialog({
        modal: true,
        buttons: {
            Aceptar: function(){
                $(this).dialog("close");
            }
        }
    });
}

// GRABAR VUELO
function guardarVuelo(){
    $.ajax({
        url: "Controllers/user/vuelos.php?accion=altavuelo",
        type: "POST",
        data: {numRegistro: $("#registro").val(),
            fecha: $("#fecha").val(),
            tiempo: $("#tiempo").val(),
            matricula: $("#matricula").val(),
            modalidad: $("#modalidad").val(),
            zona: $("#zona").val()}
    }).done(function(){
        $("#reset").attr("id", "borrar").attr("value", "Borrar Vuelo").attr("type", "button");
        $("#borrar").click(borrar);
        $("#guardar").attr("id", "modificar").attr("value", "Modificar Vuelo").attr("type", "button");
        $("#modificar").click(modificar);
        $("#personal").css("display", "block");
        $("#agregar").click(function(){
            dialogo.dialog("open");
        });
        $("#nuevo").click(nuevo);
    }).fail(function(){
        fallo()
    });
}

// NUEVO VUELO
function nuevo(){
    window.location = "index.php?opcion=vuelos&accion=alta";
}

// BUSCAR VUELO
$("#buscarVuelo").click(function(){
    console.log("Boton de 'buscar' pulsado");
    $.ajax({
        url: "Controllers/user/vuelos.php",
        type: "POST",
        data: {accion: "buscarvuelo",
            numBusqueda: $("#numBusqueda").val()}
    }).done(function(vuelo){
        vuelo = jQuery.parseJSON(vuelo);
        if(vuelo != null){
            $("#resultado").attr("style", "display: block");
            $("#registro").val(vuelo.NumRegistro);
            $("#fecha").val(vuelo.FecVuelo);
            $("#tiempo").val(vuelo.Tiempo);
            $("#modalidad").val(vuelo.Modalidad);
            $("#zona").val(vuelo.Zona);
            $("#matricula").val(vuelo.Matricula);
            $("#personal").css("display", "block");
            $.ajax({
                url: "Controllers/user/vuelos.php",
                type: "POST",
                data: {accion: "buscartripulacion",
                    numBusqueda: $("#numBusqueda").val()}
            }).done(function(datos){
                $("#leyenda").siblings("div").remove();
                var tripulacion = jQuery.parseJSON(datos);
                console.log(tripulacion);
                if(tripulacion.length > 0){
                    for(var i = 0; i < tripulacion.length; i++){
                        var tripu = jQuery.parseJSON(tripulacion[i]);
                        var linea = $("<div id=\"linea\"></div>");
                        var componente = $("<a>"+tripu.nombre+" "+tripu.apellidos+" ("+tripu.funcion+")</a>");
                        var borra = $("<input type=\"button\" id=\""+tripu.dni+"\" value=\"Borrar\" />");
                        linea.append(componente,borra);
                        $("#agregar").before(linea);
                        borra.click(borrado);
                    }
                } else {
                    $("#leyenda").siblings("div").remove();
                }
            })
            $("#agregar").click(function(){
                dialogo.dialog("open");
            });
        } else {
            $("#resultado").removeAttr("style");
            $("#personal").removeAttr("style");
            $("#numBusqueda").val("");
            $("#resulOk").html("No se ha encontrado ningún vuelo con ese número de registro").attr("title", "ERROR");
            $("#resulOk").dialog({
                modal: true,
                buttons:{
                    Aceptar: function(){
                        $(this).dialog(("close"));
                    }
                }
            })
        }
    }).fail(function(){
        fallo();
    })
})

// MODIFICAR VUELO
function modificar(){
    $("#confirmacion").html("¿Está seguro de que desea modificar este vuelo?").attr("title", "ADVERTENCIA");
    $("#confirmacion").dialog({
        modal: true,
        buttons: {
            NO: function(){
                $(this).dialog("close");
            },
            SI: function() {
                $.ajax({
                    url: "Controllers/user/vuelos.php",
                    type: "POST",
                    data: {accion: "modificarvuelo",
                        registro: $("#registro").val(),
                        fecha: $("#fecha").val(),
                        tiempo: $("#tiempo").val(),
                        matricula: $("#matricula").val(),
                        modalidad: $("#modalidad").val(),
                        zona: $("#zona").val()}
                }).done(function(){
                    $("#resulOk").html("Modificación realizada con éxito");
                    $("#resulOk").dialog({
                        modal: true,
                        buttons:{
                            Aceptar: function(){
                                $(this).dialog("close");
                            }
                        }
                    })
                }).fail(function(){
                    fallo();
                })
                $(this).dialog("close");
            }
        }
    })
}

// BORRAR VUELO
function borrar(){
    $("#confirmacion").html("¿Está seguro de que desea borrar este vuelo?").attr("title", "ADVERTENCIA");
    $("#confirmacion").dialog({
        modal: true,
        buttons:{
            NO: function(){
                $(this).dialog("close");
            },
            SI: function(){
                $.ajax({
                    url: "Controllers/user/vuelos.php",
                    type: "POST",
                    data: {accion: "borrarvuelo",
                        numRegistro: $("#registro").val()
                    }
                }).done(function(){
                    $("#resulOk").html("Borrado realizado con éxito");
                    $("#resulOk").dialog({
                        modal: true,
                        buttons:{
                            Aceptar: function(){
                                $(this).dialog(("close"));
                                window.location = "";
                            }
                        }
                    })
                }).fail(function(){
                    fallo();
                })
                $(this).dialog("close")
            }
        }
    })
    console.log("Boton de borrado pulsado");
}

// Cuadro dialogo busqueda de personal por DNI
var dialogo = $("#busqueda").dialog({
    autoOpen: false,
    height: 220,
    width: 400,
    modal: true,
    buttons: {
        Cancel: function(){
            $(this).dialog("close");
        }
    },
    close: function(){
        $("#dni").val("");
        if($("#encontrado").length > 0){
            $("#encontrado").remove();
        }
    }
})

// Busqueda de personal por DNI
$("#buscar").click(function(){
    $.ajax({
        url: "Controllers/user/personal.php",
        type: "POST",
        data: {accion: "busqueda",
            id: $("#dni").val()}
    }).done(function(datos){
        datos = jQuery.parseJSON(datos);
        if(datos.nombre != null){
            $("#buscar").after("<p><input type='button' id='encontrado' /></p>");
            $("#encontrado").attr("value", ""+datos.nombre+" "+datos.apellidos).click(function(){
                agregarTripulacion(datos);
                dialogo.dialog("close");
            });
        } else {
            
        }
    }).fail(function(){
        fallo()
    });
});

// Agregar tripulacion
function agregarTripulacion(tripulacion){
    $.ajax({
        url: "Controllers/user/vuelos.php",
        type: "POST",
        data:{accion: "altapersonal",
            dni: $("#dni").val(),
            numRegistro: $("#registro").val()
        }
    }).done(function(){
        var linea = $("<div id=\"linea\"></div>");
        var tripu = $("<a>"+tripulacion.nombre+" "+tripulacion.apellidos+" ("+tripulacion.funcion+")</a>");
        var borra = $("<input type=\"button\" id=\""+tripulacion.dni+"\" value=\"Borrar\" />");
        linea.append(tripu,borra);
        $("#agregar").before(linea);
        borra.click(borrado);
    }).fail(function(){
        fallo()
    });
}

// Borrar tripulación
function borrado(){
    $.ajax({
        url: "Controllers/user/vuelos.php",
        type: "POST",
        data:{accion: "bajapersonal",
            numRegistro: $("#registro").val(),
            dni: $(this).attr("id")
        }
    }).done(function(){
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
    }).fail(function(){
        fallo()
    });
    $(this).parent().remove();
}

// CARGA DEL DOCUMENTO
$(document).ready(function(){
    $.ajax({
        url: "Controllers/user/vuelos.php?accion=modelo",
        type: "POST",
        data: {matricula:$("#matricula").val()}
    }).done(function(response) {
        if(response != ""){
            $("#modelo").val(response);
        } else {
            $("#modelo").val(1);
        }
    }).fail(function(){
        fallo()
    });
    $("#modificar").click(modificar);
    $("#guardar").click(guardarVuelo);
    $("#borrar").click(borrar);
    $("#matricula").change(function(){
        $.ajax({
            url: "Controllers/user/vuelos.php?accion=modelo",
            type: "POST",
            data: {matricula:$("#matricula").val()}
        }).done(function(response) {
            if(response != ""){
                $("#modelo").val(response);
            } else {
                $("#modelo").val(1);
            }
        }).fail(function(){
            fallo()
        });
    });
});