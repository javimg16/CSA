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
            <div class="logo">
        
            </div>
            <div class="titulo">
                PROYECTO CSA
            </div>
            <hr>
        </header>
        <section>
                <form method="post" action="?login">
                    <fieldset>
                        <legend>Recuperación de Contraseña</legend>
                        <div class="imagenes">
                            <!-- Capa para el carrusel de imagenes -->
                        </div>
                        <table>
                            <tr>
                                <td><label for="correo">e-Mail:</label></td>
                                <td><input type="text" name="correo" size="75" /></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Enviar Contraseña" class="ui-button ui-widget ui-corner-all" /></td>
                                <td><a href="index.php" class="ui-button ui-widget ui-corner-all">Volver</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
        </section>