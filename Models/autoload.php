<?php

spl_autoload_register(function($clase){
    include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/'.$clase.'.php';
});

?>