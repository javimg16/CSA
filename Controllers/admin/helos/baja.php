<?php

include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

$matricula = $_REQUEST['id'];
$fecBaja = $_REQUEST['fecBaja'];

$heli = new Helicopteros($matricula);

$resultado = $heli -> update($matricula, $fecBaja);

echo $resultado;

?>
