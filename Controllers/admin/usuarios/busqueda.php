<?php

include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

$id = $_REQUEST['id'];

$envio = Gestores::retrive($id, 2);

echo json_encode($envio);
        
?>
