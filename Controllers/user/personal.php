<?php
    $autoload = $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';
    $accion = $_REQUEST['accion'];
    
    // Alta de personal
    if($accion == "alta"){
        $dni = $_REQUEST['dni'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $fecAlta = $_REQUEST['fecAlta'];
        $funcion = $_REQUEST['funcion'];

        $persona = new Personal($dni);
        $persona -> setNombre($nombre);
        $persona -> setApellidos($apellidos);
        $persona -> setFecAlta($fecAlta);
        $persona -> setFuncion($funcion);
        $persona -> create();

        if(isset($_REQUEST['HE-26']))
            $persona -> modelos($dni, $_REQUEST['HE-26']);
        if(isset($_REQUEST['HR-12']))
            $persona -> modelos($dni, $_REQUEST['HR-12']);
        if(isset($_REQUEST['HT-17']))
            $persona -> modelos($dni, $_REQUEST['HT-17']);
        if(isset($_REQUEST['HU-10']))
            $persona -> modelos($dni, $_REQUEST['HU-10']);
    }
    
    // Busqueda de personal
    elseif($accion == "busqueda"){
        include $autoload;
        
        $dni = $_REQUEST['id'];

        $persona = new Personal($dni);

        $resultado = $persona ->retrive($dni);

        $persona -> setNombre($resultado['Nombre']);
        $persona -> setApellidos($resultado['Apellidos']);
        $persona -> setFecAlta($resultado['FecAlta']);
        $persona -> setFuncion($resultado['Funcion']);

        echo json_encode($persona);
    }
    
    // Modificación de datos de personal
    elseif($accion == "modificar"){
        include $autoload;
        
        $dni = $_REQUEST['dni'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $fecAlta = $_REQUEST['fecAlta'];
        $funcion = $_REQUEST['funcion'];

        $persona = new Personal($dni);
        
        $persona -> update($nombre, $apellidos, $fecAlta, $funcion);
        $persona -> delMod();
        
        $modelo1 = $_REQUEST['modelo1'];
        $modelo2 = $_REQUEST['modelo2'];
        $modelo3 = $_REQUEST['modelo3'];
        $modelo4 = $_REQUEST['modelo4'];
               
        if($modelo1 == "true") {
            $persona->modelos($dni, "HE-26");
        }
        if($modelo2 == "true"){
            $persona -> modelos($dni, "HR-12");
        }
        if($modelo3 == "true"){
            $persona -> modelos($dni, "HT-17");
        }
        if($modelo4 == "true"){
            $persona -> modelos($dni, "HU-10");
        }
    }
    
    // Borrado de personal
    elseif($accion == "borrar"){
        include $autoload;
        
        $dni = $_REQUEST['dni'];
        $persona = new Personal($dni);
        
        if($_REQUEST['tieneCursos']){
            $persona -> delMod();
        }
        
        $respuesta = $persona -> delete();
        
        echo $respuesta;
    } 
    
    // Listado de modelos del personal
    elseif ($accion == 'modelos') {
        include $autoload;

        $persona = new Personal($_REQUEST['dni']);

        $modelos = $persona -> retriveMod();

        $cursos = array();

        foreach ($modelos as $modelo) {
            if(in_array("HE-26", $modelo) != false) {
                array_push($cursos, $modelo['Modelo']);
            } elseif(in_array("HU-10", $modelo) != false) {
                array_push($cursos, $modelo['Modelo']);
            } elseif(in_array("HT-17", $modelo) != false) {
                array_push($cursos, $modelo['Modelo']);
            } elseif(in_array("HR-12", $modelo) != false) {
                array_push($cursos, $modelo['Modelo']);
            }
        }

        echo json_encode($cursos);
    }
?>