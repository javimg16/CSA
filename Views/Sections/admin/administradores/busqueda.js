/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var resultado = document.getElementById("resultado");
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
        console.log(document.getElementById("id").value);
        conexion.send("id="+document.getElementById("id").value); 
    }
    function respuesta(){
        if(conexion.readyState == 4){
            if(conexion.status == 200){
                recibeDatos(conexion.responseText);
            }
        }
    }
    
    function recibeDatos(datos){
        if(!resultado.hasChildNodes()){
            formulario();
        } else {
            var fieldset = document.getElementById("fieldset");
            var padre = fieldset.parentNode;
            padre.removeChild(fieldset);
            formulario();
        }
    }
    
    function formulario(){
        var fieldset = document.createElement("fieldset");
        fieldset.setAttribute("id", "fieldset");
        var legend = document.createElement("legend");
        var tabla = document.createElement("table");
        var fila1 = document.createElement("tr");
        var fila2 = document.createElement("tr");
        var fila3 = document.createElement("tr");
        var celda11 = document.createElement("td");
        celda11.innerHTML = "<label>Administrador</label>";
        var celda12 = document.createElement("td");
        celda12.innerHTML = "<input type=\"text\" name=\"administrador\" />";
        var celda13 = document.createElement("td");
        celda13.innerHTML = "<label>Contraseña</label>";
        var celda14 = document.createElement("td");
        celda14.innerHTML = "<input type=\"text\" name=\"contra\" />";
        var celda21 = document.createElement("td");
        celda21.innerHTML = "<label>Correo</label>";
        var celda22 = document.createElement("td");
        celda22.setAttribute("colspan", "3");
        celda22.innerHTML = "<input type=\"text\" name=\"correo\" size=\"60\"/>";
        var celda31 = document.createElement("td");
        celda31.innerHTML = "<input type=\"button\" value=\"Modificar\" id=\"modificar\" />";
        var celda32 = document.createElement("td");
        celda32.innerHTML = "<input type=\"button\" value=\"Eliminar\" id=\"eliminar\" />";
        fila1.appendChild(celda11);
        fila1.appendChild(celda12);
        fila1.appendChild(celda13);
        fila1.appendChild(celda14);
        fila2.appendChild(celda21);
        fila2.appendChild(celda22);
        fila3.appendChild(celda31);
        fila3.appendChild(celda32);
        legend.innerHTML = "Resultado Busqueda Administradores";
        resultado.appendChild(fieldset);
        fieldset.appendChild(legend);
        fieldset.appendChild(tabla);
        tabla.appendChild(fila1);
        tabla.appendChild(fila2);
        tabla.appendChild(fila3);
    }
    
    window.onload = function(){
        document.getElementById("buscar").onclick = peticion;
    }
