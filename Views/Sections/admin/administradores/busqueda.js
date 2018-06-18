var conexion;
    /* Petición AJAX */
    function peticion(){
        if(window.XMLHttpRequest){
           conexion = new XMLHttpRequest();
        } else {
            conexion = new ActiveXObject("Microsoft.XMLTHHP");
        }
        /* Configuramos el callback para procesar la respuesta y enviamos las peticiones */
        conexion.onreadystatechange = respuesta;
        conexion.open("POST", "Controllers/admin/administradores/busqueda.php");
        conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        conexion.send("id="+document.getElementById("id").value); 
    }
    function respuesta(){
        if(conexion.readyState == 4){
            if(conexion.status == 200){
                recibeDatos(conexion.responseText);
            }
        }
    }
    
    function recibeDatos(jdatos){
        datos = JSON.parse(jdatos);
        busqueda(datos);
    }
    
    function busqueda(datos){
        if(datos != null){
            document.getElementById("resulOk").innerHTML = "";
            document.getElementById("resultado").style.visibility = "visible";
            document.getElementById("administrador").value = datos.ID;
            document.getElementById("contra").value = datos.Password;
            document.getElementById("correo").value = datos.Correo;
            // PARA ELIMINAR
            document.getElementById("eliminar").onclick = function(){
                document.getElementById("mensajeEliminar").style.visibility = "visible";
                document.getElementById("noEliminar").onclick = function(){
                    document.getElementById("mensajeEliminar").style.visibility = "hidden";
                }
                document.getElementById("siEliminar").onclick = function(){
                    if(window.XMLHttpRequest){
                        conexion = new XMLHttpRequest();
                    } else {
                        conexion = new ActiveXObject("Microsoft.XMLTHHP");
                    }
                    conexion.onreadystatechange = respuestaBorrado;
                    conexion.open("POST", "Controllers/admin/administradores/borrar.php");
                    conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    conexion.send("id="+document.getElementById("administrador").value);
                    
                    function respuestaBorrado(){
                        if(conexion.readyState == 4){
                            if(conexion.status == 200){
                                if(conexion.responseText == 1){
                                    document.getElementById("resultado").style.visibility = "hidden";
                                    document.getElementById("mensajeEliminar").style.visibility = "hidden";
                                    document.getElementById("resulOk").innerHTML = "<a>"+
                                            "El Administrador se ha borrado satisfactoriamente</a>";
                                    document.getElementById("id").value = null;
                                }  
                            }
                        }
                    }
                }
            }
            // PARA MODIFICAR
            document.getElementById("modificar").onclick = function() {
                document.getElementById("mensajeModificar").style.visibility = "visible";
                document.getElementById("noModificar").onclick = function(){
                    document.getElementById("mensajeModificar").style.visibility = "hidden";
                }
                document.getElementById("siModificar").onclick = function() {
                    if(window.XMLHttpRequest){
                        conexion = new XMLHttpRequest();
                    } else {
                        conexion = new ActiveXObject("Microsoft.XMLTHHP");
                    }
                    conexion.onreadystatechange = respuestaModificacion;
                    conexion.open("POST", "Controllers/admin/administradores/modificar.php");
                    conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    conexion.send("id=" + document.getElementById("administrador").value +
                            "&contra=" + document.getElementById("contra").value +
                            "&tipo=1" +
                            "&correo="+ document.getElementById("correo").value);
                    
                    function respuestaModificacion(){
                        if(conexion.readyState == 4){
                            if(conexion.status == 200){
                                if(conexion.responseText == 1){
                                    console.log(conexion.responseText);
                                    document.getElementById("resultado").style.visibility = "hidden";
                                    document.getElementById("mensajeModificar").style.visibility = "hidden";
                                    document.getElementById("resulOk").innerHTML = "<a>"+
                                            "El Administrador se ha modificado correctamente</a>";
                                    document.getElementById("id").value = null;
                                }  
                            }
                        }
                    }
                }
            }
            
            
            
        } else {
            console.log(datos);
            document.getElementById("resultado").style.visibility = "hidden";
            document.getElementById("resulOk").innerHTML = "Inserta un Administrador válido";
        }
    }
    
    window.onload = function(){
        document.getElementById("buscar").onclick = peticion;
    }
