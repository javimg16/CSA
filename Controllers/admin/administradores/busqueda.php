<?php

include '../../../Models/Gestores.php';

$id = ($_REQUEST['id']);

$envio = Gestores::retriveAdmin($id);

echo json_encode($envio);
        
?>
