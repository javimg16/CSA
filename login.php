<!Doctype HTML>
<html>
    <head>
        
    </head>
    <body>
        <?php 
            session_start();
            if(isset($_SESSION['tipo'])){
                header('location:index.php');
            }
            include 'Models/header.php' 
        ?>
        <section>
            <form method="post" action="Controllers/comprobar.php">
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
                            <td><input type="button" value="Recuperar Contraseña" /></td>
                        </tr>
                    </table>

                </fieldset>
            </form>
        </section>
        <?php include 'Models/footer.php' ?>
    </body>
</html>