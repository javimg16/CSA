<?php

    include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';
    
    $cursos = new Cursos();
    
    print_r($cursos -> retriveAll());

    
?>