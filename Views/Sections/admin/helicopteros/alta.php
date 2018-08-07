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
                            <?php
                                $modelos = Helicopteros::modelos();
                                while ($fila = $modelos -> fetch_array()) {
                                    print("<option value=".$fila['Modelo']." >".$fila['Modelo']."</option>");
                                }
                            ?>
                        </select>
                    </td>
                    <td><label for="fecha">Fecha de Alta</label></td>
                    <td><input type="date" name="fecAlta"/>
                </tr>
                <tr>
                    <td><label for="simulador">¿Es un Simulador?</td>
                    <td><input type="checkbox" name="simulador" value="1" /></td>
                    <td colspan="4"><input type="submit" value="Dar de alta" class="ui-button ui-widget ui-corner-all" /></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <a href="index.php" class="ui-button ui-widget ui-corner-all" >Inicio</a>
</section>