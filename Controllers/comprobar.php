<?php

/* 
 * Comprueba que existe el usuario en la BBDD
 * Si existe guarda en la variable sesión si es usuario o administrador
 * y vuelve al index
 */

    include 'Models/Conexiones.php';
   
    $usuario = $_REQUEST['usuario'];
    $contra = $_REQUEST['contra'];
    
    $tipo = Conexiones::comprobar($usuario, $contra);
    if($tipo == 1) {
        $_SESSION['tipo'] = "@administrador";
        header('location:index.php');
    } else if ($tipo == 2) {
        $_SESSION['tipo'] = "@usuario";
        header('location:index.php');
    } else {
        //Hay que redirigirlo a una pagina solo HTML
        print 'El usuario o la contraseña no son correctas, intentelo de nuevo';
    }

    
?>