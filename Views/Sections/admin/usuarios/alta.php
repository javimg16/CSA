<section>
    <form method="post" action="index.php?opcion=user&accion=alta&datos">
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
                    <td><input type="submit" value="Dar de alta"  class="ui-button ui-widget ui-corner-all"/></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <div id="inicio">
        <a href="index.php" class="ui-button ui-widget ui-corner-all">Inicio</a>
    </div>
</section>