<?php
    include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';
    
    $id = $_REQUEST['id'];
    $usuario = $_REQUEST['usuario'];
    $contra = $_REQUEST['contra'];
    $tipo = $_REQUEST['tipo'];
    $correo =  $_REQUEST['correo'];
    
    $modifica = Gestores::update($id, $usuario, $contra, $tipo, $correo);
    
    echo $modifica;
?>
