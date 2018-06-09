<?php
    include 'Models/Gestores.php';
    $administrador = $_REQUEST['administrador'];
    $contra = $_REQUEST['contra'];
    $correo = $_REQUEST['correo'];
    
    $gestor = new Gestores($administrador, $contra, '1', $correo);
    
    print_r($gestor);
    
    $gestor -> createAdmin();
    
?>