<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $accion = $_REQUEST['accion'];
    
    // Alta administradores    
    if($accion == "alta"){
        $administrador = $_REQUEST['administrador'];
        $contra = $_REQUEST['contra'];
        $correo = $_REQUEST['correo'];

        Gestores::create($administrador, $contra, 1, $correo);
    }
    
    // Busqueda administradores
    elseif($accion == "busqueda"){
        include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

        $id = $_REQUEST['id'];

        $envio = Gestores::retrive($id, 1);

        echo json_encode($envio);
    }

    // Modificar administradores
    elseif ($accion == "modificar") {
        include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

        $id = $_REQUEST['id'];
        $administrador = $_REQUEST['administrador'];
        $contra = $_REQUEST['contra'];
        $tipo = $_REQUEST['tipo'];
        $correo = $_REQUEST['correo'];

        $respuesta = Gestores::update($id, $administrador, $contra, $tipo, $correo);

        echo $respuesta;
    }
    
    // Borrar administradores
    elseif($accion == "borrar") {
        include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

        $id = ($_REQUEST['id']);
    
        $realizado = Gestores::delete($id, 1);
    
        echo $realizado;
    }

?>