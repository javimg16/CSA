<?php
    
    $administrador = $_REQUEST['administrador'];
    $contra = $_REQUEST['contra'];
    $correo = $_REQUEST['correo'];
    
    include 'Models/Gestores.php';
    $gestor = new Gestores($administrador, $contra, 1, $correo);
    
    $gestor -> createAdmin();
    
?>