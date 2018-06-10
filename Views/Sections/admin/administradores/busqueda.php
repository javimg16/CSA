<section>
    <div class="busqueda">
        <label>Introduce el administrador</label>
        <input type="text" id="id"/>
        <input type="button" value="Buscar" id="buscar" />
    </div>
    <div class="resultado">
        
    </div>
    <div id="inicio">
        <a href="index.php">Inicio</a>
    </div>
</section>
<script type="text/javascript">
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
        console.log(datos);
    }
    
    window.onload = function(){
        document.getElementById("buscar").onclick = peticion;
    }
</script>
    