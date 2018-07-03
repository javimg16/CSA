<?php
    
    //include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

    $dni = $_REQUEST['dni'];
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $fecAlta = $_REQUEST['fecAlta'];
    $funcion = $_REQUEST['funcion'];
    
    $persona = new Personal($dni, $nombre, $apellidos, $fecAlta, $funcion);
    $persona -> create();
    
    
    if(isset($_REQUEST['HE-26']))
        $persona -> modelos($dni, $_REQUEST['HE-26']);
    if(isset($_REQUEST['HR-12']))
        $persona -> modelos($dni, $_REQUEST['HR-12']);
    if(isset($_REQUEST['HT-17']))
        $persona -> modelos($dni, $_REQUEST['HT-17']);
    if(isset($_REQUEST['HU-10']))
        $persona -> modelos($dni, $_REQUEST['HU-12']);
    
    //print_r($persona);
   // echo "he-26:".$he26." - hr12".$hr12." - otros";
    

?>