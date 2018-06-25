<?php

session_start();

include 'Models/autoload.php';

/* L O G I N */
if (!isset($_SESSION['tipo'])) {
    if (isset($_REQUEST['recuperar'])) {
        include_once 'Views/Sections/Login/recuperar.php';
    } else {
        include 'Views/Sections/Login/login.php';
        if (isset($_REQUEST['login'])) {
            include_once 'Controllers/comprobar.php';
        }
    }
} 
/* F I N   D E   L O G I N */


/* G E S T O R E S */
else {
    include 'Views/header.php';
    /* ADMIN */
    if ($_SESSION['tipo'] == "@administrador") {
        include 'Views/Sections/admin/menu.php';
        /* portada */
        if(!isset($_REQUEST['opcion'])) {
            include 'Views/Sections/portada.php';
        }
        else {
            /* administradores */
            if($_REQUEST['opcion'] == "admin") {
                if($_REQUEST['accion'] == 'alta') {
                    include 'Views/Sections/admin/administradores/alta.php';
                    if (isset($_REQUEST['datos'])) {
                        require 'Controllers/admin/administradores/alta.php';
                    }
                } elseif ($_REQUEST['accion'] == 'busqueda') {
                    include 'Views/Sections/admin/administradores/busqueda.php';
                }
            } 
            /* usuarios */ 
            elseif ($_REQUEST['opcion'] == 'user') {
                if ($_REQUEST['accion'] == 'alta') {
                    include 'Views/Sections/admin/usuarios/alta.php';
                    if (isset($_REQUEST['datos'])) {
                        require 'Controllers/admin/usuarios/alta.php';
                    } 
                } elseif ($_REQUEST['accion'] == 'busqueda') {
                    include 'Views/Sections/admin/usuarios/busqueda.php';
                }
            }

            /* helicopteros */
            elseif ($_REQUEST['opcion'] == 'helos') {
                if ($_REQUEST['accion'] == 'alta') {
                    include 'Views/Sections/admin/helicopteros/alta.php';
                    if (isset($_REQUEST['datos'])) {
                        require 'Controllers/admin/helos/alta.php';
                    }
                } elseif ($_REQUEST['accion'] == 'busqueda'){
                    include 'Views/Sections/admin/helicopteros/busqueda.php';
                }
            }
            /* cursos */
            elseif ($_REQUEST['opcion'] == 'cursos'){
                if($_REQUEST['accion'] == 'listar'){
                    
                } elseif ($_REQUEST['accion'] == 'alta') {
                    
                }
            }
            
        /* FIN DE ADMIN */
    
        }
    }
    /* USER */ 
    elseif ($_SESSION['tipo'] == "@usuario") {
        include 'Views/Sections/user/menu.php';
        if (isset($_REQUEST['altapersonal'])) {
            include 'Views/Sections/user/personal/alta.php';
        } elseif (isset($_REQUEST['altavuelo'])) {
            include 'Views/Sections/user/vuelos/alta.php';
        } else {
            include 'Views/Sections/portada.php';
        }
    }
    /* FIN DE USER */
}

/* F I N   D E   G E S T O R E S */

/* FOOTER */
include 'Views/footer.php';
?>
    