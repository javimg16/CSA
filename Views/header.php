<!DOCTYPE html>
<head>
        <meta charset="UTF-8">
        <title>PROYECTO CSA - Veronica BG & Javi MG</title>
        <link rel=stylesheet type="text/css" href="Views/CSS/index.css" />
    </head>
    <body>
        <header>
            <div class="logo">

            </div>

            <div class="titulo">
                PROYECTO CSA
            </div>
            <div class="categoria">
                <a><?php echo ($_SESSION['tipo']) ?></a>
                <a href="index.php?accion=desconectar">Desconectar</a>
            </div>
            <hr>
        </header>