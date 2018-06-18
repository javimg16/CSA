<?php
    
    $matricula = $_REQUEST['matricula'];
    $modelo = $_REQUEST['modelo'];
    $fecAlta = $_REQUEST['fecAlta'];
    if(!isset($_REQUEST['simulador']))
        $simulador = 2;
    else
        $simulador = $_REQUEST['simulador'];
        
    $heli = new Helicopteros($matricula, $simulador, $fecAlta, $modelo);
    
    $heli -> create();


?>