<?php
    include '../../../Models/Gestores.php';
    
    $id = ($_REQUEST['id']);
    
    $realizado = Gestores::deleteAdmin($id);
    
    echo $realizado;
    
?>