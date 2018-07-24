<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>PROYECTO CSA - Veronica BG & Javi MG</title>
        <link rel="stylesheet" type="text/css" href="Views/CSS/index.css" />
    </head>
    <body>
        <header>
            <div class="logo">
        
            </div>
            <div class="titulo">
                PROYECTO CSA
            </div>
            <hr>
        </header>
        <section>
                <form method="post" action="index.php?login">
                    <fieldset>
                        <legend>LOGIN</legend>
                        <div class="imagenes">
                            <!-- Capa para el carrusel de imagenes -->
                        </div>
                        <table>
                            <tr>
                                <td><label for="usuario">USUARIO:</label></td>
                                <td><input type="text" name="usuario" /></td>
                            </tr>
                            <tr>
                                <td><label for="contra">CONTRASEÑA:</label></td>
                                <td><input type="password" name="contra" /></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Entrar" /></td>
                                <td><a href="index.php?recuperar">Recuperar Contraseña</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
        </section>