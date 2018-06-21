<?php

include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

$matricula = $_REQUEST['id'];
$modelo = $_REQUEST['modelo'];
if(!isset($_REQUEST['simulador']))
        $simulador = 2;
    else
        $simulador = 1;
$fecAlta = $_REQUEST['fecAlta'];
$fecBaja = $_REQUEST['fecBaja'];

$heli = new Helicopteros($matricula);

$resultado = $heli -> update($matricula, $modelo, $simulador, $fecAlta, $fecBaja);

echo $simulador;

?>
