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
    /* CERRAR SESION */
    if(isset($_REQUEST['accion']) && $_REQUEST['accion'] == "desconectar"){
        session_destroy();
        header("location:index.php");
    }
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
                        require 'Controllers/admin/administradores.php';
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
                        require 'Controllers/admin/helos.php';
                    }
                } elseif ($_REQUEST['accion'] == 'busqueda'){
                    include 'Views/Sections/admin/helicopteros/busqueda.php';
                }
            }
            /* cursos */
            elseif ($_REQUEST['opcion'] == 'cursos'){
                if($_REQUEST['accion'] == 'listar'){
                    include 'Views/Sections/admin/cursos/listar.php';
                } elseif ($_REQUEST['accion'] == 'alta') {
                    include 'Views/Sections/admin/cursos/alta.php';
                    if(isset($_REQUEST['datos'])){
                        require 'Controllers/admin/cursos.php';
                    }
                }
            }
        /* FIN DE ADMIN */
        }
    }
    /* USER */ 
    elseif ($_SESSION['tipo'] == "@usuario") {
        include 'Views/Sections/user/menu.php';
        /* portada */
        if(!isset($_REQUEST['opcion'])) {
            include 'Views/Sections/portada.php';
        } 
        else {
            /* personal */
            if ($_REQUEST['opcion'] == "personal") {
                $accion = $_REQUEST['accion'];
                if($accion == "alta"){
                    include 'Views/Sections/user/personal/alta.php';
                    if (isset($_REQUEST['datos'])) {
                        include 'Controllers/user/personal.php';
                    }
                } elseif($accion == "busqueda"){
                    include 'Views/Sections/user/personal/busqueda.php';
                } 
            } 
            /* helicópteros */
            elseif ($_REQUEST['opcion'] == "helicopteros") {
                include 'Views/Sections/user/helos/listar.php';
            }
            /* vuelos */
            elseif ($_REQUEST['opcion'] == "vuelos"){
                $accion = $_REQUEST['accion'];
                if($accion == 'alta'){
                    include 'Views/Sections/user/vuelos/alta.php';
                } elseif($accion == "busqueda") {
                    include 'Views/Sections/user/vuelos/busqueda.php';
                }
            } 
            /* estadísticas */
            elseif ($_REQUEST['opcion'] == "estadisticas"){
                include 'Views/Sections/user/estadisticas/estadisticas.php';
            }
            else {
                include 'Views/Sections/portada.php';
            }
        }
    }
    /* FIN DE USER */
}

/* F I N   D E   G E S T O R E S */

/* FOOTER */
include 'Views/footer.php';
?>
    