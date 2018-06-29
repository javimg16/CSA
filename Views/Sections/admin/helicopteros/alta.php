<section>
    <form method="post" action="index.php?opcion=helos&accion=alta&datos">
        <fieldset>
            <legend>Alta Nuevo Helicoptero</legend>
            <table>
                <tr>
                    <td><label for="matricula">Matricula</label></td>
                    <td><input type="text" name="matricula"/></td>
                    <td><label for="modelo">Modelo </label></td>
                    <td>
                        <select name="modelo">
                            <option value="HE-26">HE-26</option>
                            <option value="HR-12">HR-12</option>
                            <option value="HT-17">HT-17</option>
                            <option value="HU-10">HU-10</option>
                        </select>
                    </td>
                    <td><label for="fecha">Fecha de Alta</label></td>
                    <td><input type="date" name="fecAlta"/>
                </tr>
                <tr>
                    <td><label for="simulador">¿Es un Simulador?</td>
                    <td><input type="checkbox" name="simulador" value="1" /></td>
                    <td colspan="4"><input type="submit" value="Dar de alta" /></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <a href="index.php">Inicio</a>
</section>