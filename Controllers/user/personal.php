<?php
    $accion = $_REQUEST['accion'];
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
        
    } elseif($accion == "busqueda"){
        
        include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';
        
        $dni = $_REQUEST['id'];

        $persona = new Personal($dni);

        $resultado = $persona ->retrive($dni);

        $persona -> setNombre($resultado['Nombre']);
        $persona -> setApellidos($resultado['Apellidos']);
        $persona -> setFecAlta($resultado['FecAlta']);
        $persona -> setFuncion($resultado['Funcion']);

        echo json_encode($persona);
    } elseif ($accion == 'modelos') {
        include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

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