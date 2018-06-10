<?php

session_start();

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

/* G E S T O R E S */
else {
    include 'Views/header.php';
    /* ADMIN */
    if ($_SESSION['tipo'] == "@administrador") {
        include 'Views/Sections/admin/menu.php';
        /* administradores */
        if (isset($_REQUEST['altaadmin'])) {
            include 'Views/Sections/admin/administradores/alta.php';
            if ($_REQUEST['altaadmin'] == 'datos') {
                require 'Controllers/admin/administradores/alta.php';
            }
        } elseif (isset($_REQUEST['busquedaadmin'])) {
            include 'Views/Sections/admin/administradores/busqueda.php';
        }
        
        /* usuarios */ 
        elseif (isset($_REQUEST['altauser'])) {
            include 'Views/Sections/admin/usuarios/alta.php';
            if ($_REQUEST['altauser'] == 'datos') {
                require 'Controllers/admin/usuarios/alta.php';
            }
        } elseif (isset($_REQUEST['altahelos'])) {
            include 'Views/Sections/admin/helicopteros/alta.php';
        } else {
            include 'Views/Sections/portada.php';
        }
    }
    /* FIN DE ADMIN */

    /* USER */ elseif ($_SESSION['tipo'] == "@usuario") {
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

/* FOOTER */
include 'Views/footer.php';
?>
    