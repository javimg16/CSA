<?php
    include '../../../Models/Gestores.php';
    
    $id = ($_REQUEST['id']);
    
    $realizado = Gestores::delete($id);
    
    echo $realizado;
?>