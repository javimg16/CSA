<?php 
    session_start();
    
    if(!isset($_SESSION['tipo'])){
        if (isset($_REQUEST['recuperar'])){
            include_once 'Views/Sections/recuperar.php';
        } else {
            include 'Views/Sections/login.php';
            if(isset($_REQUEST['login'])){
                include_once 'Controllers/comprobar.php';
            }
        }
    /* gestores */    
    } else {
        include 'Views/header.php';
    }
    
    /* FOOTER */
    include 'Views/footer.php';
?>
    