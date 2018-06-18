<?php

include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

$id = ($_REQUEST['id']);

$heli = new Helicopteros($id);

echo $heli;

?>