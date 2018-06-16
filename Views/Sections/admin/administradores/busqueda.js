/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var resultado = document.getElementById("resultado");

var conexion;
    /* Petición AJAX */
    function peticion(){
        resultado.removeAttribute("id");
        
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
        console.log(jdatos);
        datos = JSON.parse(jdatos);
        console.log(datos);
        formulario(datos);
    }
    
    function formulario(datos){
        document.getElementById("administrador").value = datos.ID;
        document.getElementById("contra").value = datos.Password;
        document.getElementById("correo").value = datos.Correo;
        document.getElementById("eliminar").onclick = function(){
            document.getElementById("mensaje").style.visibility = "visible";
        }
    }
    
    document.getElementById("no").onclick = function(){
        document.getElementById("mensaje").style.visibility = "hidden";
    }
    
    window.onload = function(){
        document.getElementById("buscar").onclick = peticion;
    }
