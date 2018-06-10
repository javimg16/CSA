<?php

$id = json_encode(($_REQUEST['id']));


$envio = Gestores::retriveAdmin($id);

echo json_decode($envio);
        
?>
