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
        conexion.open("POST", "Controllers/admin/helos/busqueda.php");
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
        if(datos.modelo != null){
            console.log(datos);
            document.getElementById("resulOk").innerHTML = "";
            document.getElementById("resultado").style.visibility = "visible";
            document.getElementById("matricula").value = datos.matricula;
            if(datos.simulador == 1){
                document.getElementById("simulador").setAttribute("checked", "checked");
            } else {
                document.getElementById("simulador").removeAttribute("checked");
            }
            document.getElementById("modelo").value = datos.modelo;
            document.getElementById("fecAlta").value = datos.fecAlta;
            document.getElementById("fecBaja").value = datos.fecBaja;
            // PARA ELIMINAR
            document.getElementById("baja").onclick = function(){
                console.log("Entra en dar de baja");
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
                    conexion.open("POST", "Controllers/admin/helos/baja.php");
                    conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    conexion.send("id="+document.getElementById("matricula").value +
                            "&modelo="+document.getElementById("modelo").value +
                            "&simulador="+document.getElementById("simulador").value +
                            "&fecAlta="+document.getElementById("fecAlta").value +
                            "&fecBaja="+document.getElementById("fecBaja").value);
                    
                    function respuestaBorrado(){
                        if(conexion.readyState == 4){
                            if(conexion.status == 200){
                                if(conexion.responseText == 1){
                                    document.getElementById("resultado").style.visibility = "hidden";
                                    document.getElementById("mensajeEliminar").style.visibility = "hidden";
                                    document.getElementById("resulOk").innerHTML = "<a>"+
                                            "El helicóptero se ha dado de baja satisfactoriamente</a>";
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
            document.getElementById("resulOk").innerHTML = "Inserta una matrícula válida";
        }
    }
    
    window.onload = function(){
        document.getElementById("buscar").onclick = peticion;
    }
