<section>
    <form method="post" action="index.php?altahelos=datos">
        <fieldset>
            <legend>Alta Nuevo Helicoptero</legend>
            <table>
                <tr>
                    <td><label for="matricula">Matricula</label></td>
                    <td><input type="text" name="matricula"/></td>
                    <td><label for="modelo">Modelo </label></td>
                    <td><input type="text" name="modelo"/></td>
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