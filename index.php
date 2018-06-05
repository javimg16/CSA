<?php 
    session_start();
    
    if(!isset($_SESSION['tipo'])){
        if (isset($_REQUEST['recuperar'])){
            include_once 'Views/Sections/Login/recuperar.php';
        } else {
            include 'Views/Sections/Login/login.php';
            if(isset($_REQUEST['login'])){
                include_once 'Controllers/comprobar.php';
            }
        }
    /* gestores */    
    } else {
        include 'Views/header.php';
        /* administradores */
        if($_SESSION['tipo'] == "@administrador"){
            include 'Views/Sections/admin/menu.php';
        } 
        /* FIN DE administradores */
        /* usuarios */
        elseif($_SESSION['tipo'] == "@usuario"){
            include 'Views/Sections/user/menu.php';
        }
        /* FIN DE usuarios */
        
        include 'Views/Sections/portada.php';
    }
    
    /* FOOTER */
    include 'Views/footer.php';
?>
    