<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>PROYECTO CSA - Veronica BG & Javi MG</title>
        <link rel="stylesheet" type="text/css" href="Views/CSS/index.css" />
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
                                <td><input type="submit" value="Entrar" class="ui-button ui-widget ui-corner-all" /></td>
                                <td><a href="index.php?recuperar" class="ui-button ui-widget ui-corner-all">Recuperar Contraseña</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
        </section>