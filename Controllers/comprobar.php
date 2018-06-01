<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    include '../Class/Conexiones.php';
    
    $conexion = new Conexiones();
    $usuario = $_REQUEST['usuario'];
    $contra = $_REQUEST['contra'];

    $tipo = $conexion -> comprobar($usuario, $contra);
    if($tipo == 1) {
        $_SESSION['tipo'] = "administrador";
        print($_SESSION['tipo']);
        header('location:../index.php');
    } else if ($tipo == 2) {
        $_SESSION['tipo'] = "usuario";
        print($_SESSION['tipo']);
        header('location:../index.php');
    } else {
        print 'El usuario o la contraseña no son correctas, intentelo de nuevo';
    }

    
?>