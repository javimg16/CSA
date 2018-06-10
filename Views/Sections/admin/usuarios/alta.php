<section>
    <form method="post" action="index.php?altauser=datos">
        <fieldset>
             <legend>Alta Nuevo Usuario</legend>
            <table>
                <tr>
                    <td><label for="usuario">Usuario</label></td>
                    <td><input type="text" name="usuario"/></td>
                    <td><label for="contra">Contraseña </label></td>
                    <td><input type="password" name="contra"/></td>
                </tr>
                <tr>
                    <td><label for="correo">Correo</label></td>
                    <td colspan="3"><input type="text" name="correo" size="60"/></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Dar de alta"/></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <div id="inicio">
        <a href="index.php">Inicio</a>
    </div>
</section>