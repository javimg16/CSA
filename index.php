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
            if (isset($_REQUEST['altaadmin'])){
                include 'Views/Sections/admin/administradores/alta.php';
            } elseif(isset($_REQUEST['altauser'])) {
                include 'Views/Sections/admin/usuarios/alta.php';
            } elseif (isset($_REQUEST['altahelos'])){
                include 'Views/Sections/admin/helicopteros/alta.php';
            } else {
                include 'Views/Sections/portada.php';
            }
        } 
        /* FIN DE administradores */
        
        /* usuarios */
        elseif($_SESSION['tipo'] == "@usuario"){
            include 'Views/Sections/user/menu.php';
            if (isset($_REQUEST['altapersonal'])){
                include 'Views/Sections/user/personal/alta.php';
            } elseif(isset($_REQUEST['altavuelo'])){
                include 'Views/Sections/user/vuelos/alta.php';
            } else {
                 include 'Views/Sections/portada.php';
            }
        }
        /* FIN DE usuarios */
        
       
    }
    
    /* FOOTER */
    include 'Views/footer.php';
?>
    