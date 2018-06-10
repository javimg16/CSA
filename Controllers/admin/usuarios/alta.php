<?php
    
    $usuario = $_REQUEST['usuario'];
    $contra = $_REQUEST['contra'];
    $correo = $_REQUEST['correo'];
    
    include 'Models/Gestores.php';
    $gestor = new Gestores($usuario, $contra, 2, $correo);
    
    $gestor -> createUser();
    
?>