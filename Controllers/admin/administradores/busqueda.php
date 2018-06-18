<?php

include '../../../Models/Gestores.php';

$id = ($_REQUEST['id']);

$envio = Gestores::retrive($id, 1);

echo json_encode($envio);
        
?>
