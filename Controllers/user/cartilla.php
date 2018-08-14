<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
    $cartilla = new Cartilla($_REQUEST['dni'], $_REQUEST['fecha']);
    
    
    include 'Views/Sections/user/personal/cartilla.php';
    
    

?>