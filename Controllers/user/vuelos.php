<?php
    
    include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';
    $accion = $_REQUEST['accion'];
    
    // Mostrar Modelo del Helicóptero
    if($accion == "modelo"){
        $modelo = Helicopteros::modelo($_REQUEST['matricula']);
        echo $modelo['Modelo'];
    }
    
    // Alta de Registro de vuelo
    elseif($accion == "altavuelo"){
        $numRegistro = $_REQUEST['numRegistro'];
        $fecha = $_REQUEST['fecha'];
        $tiempo = $_REQUEST['tiempo'];
        $matricula = $_REQUEST['matricula'];
        $modalidad = $_REQUEST['modalidad'];
        $zona = $_REQUEST['zona'];
        
        $vuelo = new Vuelos($numRegistro);
        $vuelo -> setFecVuelo($fecha);
        $vuelo -> setTiempo($tiempo);
        $vuelo -> setMatricula($matricula);
        $vuelo -> setModalidad($modalidad);
        $vuelo -> setZona($zona);
        
        $vuelo -> create();
    }
    
    // Buscar Vuelo
    elseif($accion == "buscarvuelo"){
        $numRegistro = $_REQUEST['numBusqueda'];
        $vuelo = new Vuelos($numRegistro);
        echo json_encode($vuelo ->retrive());
    }
    
    
    // Modificar registro de vuelo
    elseif ($accion == "modificarvuelo") {
        $registro = $_REQUEST['registro'];
        $fecha = $_REQUEST['fecha'];
        $tiempo = $_REQUEST['tiempo'];
        $matricula = $_REQUEST['matricula'];
        $modalidad = $_REQUEST['modalidad'];
        $zona = $_REQUEST['zona'];
        
        $vuelo = new Vuelos($registro);
        $vuelo ->setFecVuelo($fecha);
        $vuelo ->setTiempo($tiempo);
        $vuelo ->setMatricula($matricula);
        $vuelo ->setModalidad($modalidad);
        $vuelo ->setZona($zona);
        $vuelo ->update();
    }
    
    
    // Borrar registro de vuelo
    elseif ($accion == "borrarvuelo") {
        $numRegistro = $_REQUEST['numRegistro'];
        
        $vuelo = new Vuelos($numRegistro);
        $vuelo -> delete();
    }
    
    // Alta de personal en el vuelo
    elseif($accion == "altapersonal"){
        $dni = $_REQUEST['dni'];
        $numRegistro = $_REQUEST['numRegistro'];
        
        $vuelo = new Vuelos($numRegistro);
        $vuelo -> altaPersonal($dni);
    }

    // Busque de personal en el vuelo
    elseif ($accion == "buscartripulacion"){
        $numRegistro = $_REQUEST['numBusqueda'];
        
        $tipulacion = array();
        $vuelo = new Vuelos($numRegistro);
        foreach ($vuelo ->busquedaPersonal() as $dni){
            $persona = new Personal($dni);
            $resultado = $persona ->retrive($dni);
            $persona -> setNombre($resultado['Nombre']);
            $persona -> setApellidos($resultado['Apellidos']);
            $persona -> setFecAlta($resultado['FecAlta']);
            $persona -> setFuncion($resultado['Funcion']);
            array_push($tipulacion, json_encode($persona));
        }
        echo json_encode($tipulacion);
    }
    
    // Baja de personal en el vuelo
    elseif ($accion == "bajapersonal") {
        $dni = $_REQUEST['dni'];
        $numRegistro = $_REQUEST['numRegistro'];
       
        $vuelo = new Vuelos($numRegistro);
        echo ($vuelo -> bajaPersonal($dni));
}
?>

