<?php

include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

$id = $_REQUEST['id'];
$administrador = $_REQUEST['administrador'];
$contra = $_REQUEST['contra'];
$tipo = $_REQUEST['tipo'];
$correo = $_REQUEST['correo'];

$respuesta = Gestores::update($id, $administrador, $contra, $tipo, $correo);

echo $respuesta;

?>