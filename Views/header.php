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
                <?php echo ($_SESSION['tipo']) ?>
            </div>
            <hr>
            <nav>
                <ul class="menu">
			<li><a href="#">Inicio</a></li>
			<li><a href="#">Tutoriales</a></li>
			<li><a href="#">Cursos</a></li>
			<li><a href="#">Preguntame algo</a></li>
			<li><a href="#">Contacto</a></li>
		</ul>
            </nav>
        </header>