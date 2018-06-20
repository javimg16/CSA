<?php
    
    $usuario = $_REQUEST['usuario'];
    $contra = $_REQUEST['contra'];
    $correo = $_REQUEST['correo'];

    Gestores::create($usuario, $contra, 2, $correo);
    
?>