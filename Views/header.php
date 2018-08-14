<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>PROYECTO CSA - Veronica BG & Javi MG</title>
        <link rel=stylesheet type="text/css" href="Views/CSS/index.css" />
        <link rel="stylesheet" href="Libreries/jquery/jquery-ui-1.12.1.custom/jquery-ui.css" >
    </head>
    <body>
        <header>
            <div >
                <img src="Views/Images/Logo.png" class="logo"/>
            </div>
            <div class="titulo">
                PROYECTO CSA
            </div>
            <div class="categoria">
                <a><?php echo ($_SESSION['tipo']) ?></a>
                <a href="index.php?accion=desconectar" class="ui-button ui-widget ui-corner-all" >Desconectar</a>
            </div>
            <hr>
        </header>