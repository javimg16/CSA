<?php

include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

$matricula = $_REQUEST['id'];

$heli = new Helicopteros($matricula);

$resultado = $heli -> retrive($matricula);

$heli -> setModelo($resultado[4]);
$heli -> setSimulador($resultado[1]);
$heli -> setFecAlta($resultado[2]);

//print_r($heli);

echo json_encode($heli);

?>