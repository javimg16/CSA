<?php

    include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

    $id = ($_REQUEST['id']);
    
    $realizado = Gestores::delete($id);
    
    echo $realizado;
?>