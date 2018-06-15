<?php

$id = json_encode(($_REQUEST['id']));


$envio = Gestores::retriveUser($id);

echo json_encode($envio);
        
?>
