<?php

    $accion = $_REQUEST['accion'];
    
    // Alta helicópteros
    if($accion == "alta"){
        $matricula = $_REQUEST['matricula'];
        $modelo = $_REQUEST['modelo'];
        $fecAlta = $_REQUEST['fecAlta'];
        if(!isset($_REQUEST['simulador']))
            $simulador = 2;
        else
            $simulador = $_REQUEST['simulador'];

        $heli = new Helicopteros($matricula);

        $heli -> setModelo($modelo);
        $heli -> setFecAlta($fecAlta);
        $heli -> setSimulador($simulador);

        $heli -> create();
    } 
    
    // Busqueda helicópteros
    elseif($accion == "busqueda"){
        include $_SERVER['DOCUMENT_ROOT'] . '/CSA/Models/autoload.php';

        $matricula = $_REQUEST['id'];

        $heli = new Helicopteros($matricula);

        $resultado = $heli -> retrive($matricula);

        $heli -> setModelo($resultado[4]);
        $heli -> setSimulador($resultado[1]);
        $heli -> setFecAlta($resultado[2]);
        $heli -> setFecBaja($resultado[3]);

        echo json_encode($heli);
} 
    
    // Baja helicópteros
    elseif($accion == "baja"){
        include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

        $matricula = $_REQUEST['id'];
        $fecBaja = $_REQUEST['fecBaja'];

        $heli = new Helicopteros($matricula);

        $resultado = $heli -> update($matricula, $fecBaja);

        echo $resultado;
    }

?>