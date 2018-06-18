<?php

    $administrador = $_REQUEST['administrador'];
    $contra = $_REQUEST['contra'];
    $correo = $_REQUEST['correo'];

    Gestores::create($administrador, $contra, 1, $correo);
    
?>