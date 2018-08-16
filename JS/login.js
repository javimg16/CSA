$("#enviar").click(function(){
    $.ajax({
        url: "Controllers/login.php",
        type: "POST",
        data: {accion: "recuperar",
            correo: $("#correo").val()}
    }).done(function(respuesta){
        if(respuesta == 1){
            $("#mensaje").html("Se ha enviado la Contraseña al Correo indicado").attr("title", "MENSAJE");
            $("#mensaje").dialog({
                modal: true,
                buttons: {
                    Aceptar: function(){
                        $(this).dialog("close");
                    }
                }
            })
        } else {
            $("#mensaje").html("El Correo indicado no existe").attr("title", "MENSAJE");
            $("#mensaje").dialog({
                modal: true,
                buttons: {
                    Aceptar: function(){
                        $(this).dialog("close");
                    }
                }
            })
        }
    }).fail(function(){
        $("#mensaje").html("No se ha podido comprobar si existe el Correo. Llame al Administrador de la Apliación").attr("title", "MENSAJE");
        $("#mensaje").dialog({
            modal: true,
            buttons: {
                Aceptar: function(){
                    $(this).dialog("close");
                }
            }
        })
    })
})

$("#entrar").click(function(){
    $.ajax({
        url: "Controllers/login.php",
        type: "POST",
        data:{accion: "comprobar",
            usuario: $("#usuario").val(),
            contra: $("#contra").val()}
    }).done(function(respuesta){
        if(respuesta == "Sin datos"){
           $("#mensaje").html("Usuario y/o constraseña Incorrecto").attr("title", "MENSAJE");
            $("#mensaje").dialog({
                modal: true,
                buttons: {
                    Aceptar: function(){
                        $(this).dialog("close");
                    }
                }
            }) 
        } else {
            console.log(respuesta);
            window.location = "index.php"
        }
        
    }).fail(function(){
       $("#mensaje").html("No se ha podido comprobar si existe el Usuario. Llame al Administrador de la Apliación").attr("title", "MENSAJE");
        $("#mensaje").dialog({
            modal: true,
            buttons: {
                Aceptar: function(){
                    $(this).dialog("close");
                }
            }
        }) 
    })
})