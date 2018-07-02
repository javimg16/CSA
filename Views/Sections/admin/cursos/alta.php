<section>
    <form method="post" action="index.php?opcion=cursos&accion=alta&datos">
        <fieldset>
            <legend>Nuevo Curso</legend>
            <table>
                <tr>
                    <td><label for="modelo">Modelo </label></td>
                    <td>
                        <select name="modelo">
                        <?php
                            $modelos = Cursos::modelos();
                            while ($fila = $modelos -> fetch_array()) {
                                print("<option value=".$fila['Modelo'].">".$fila['Modelo']."</option>");
                            }
                        ?>
                        </select>
                    </td>
                    <td><label for="fechaini">Fecha Inicio </label></td>
                    <td><input type="date" name="fechaini" /></td>
                </tr>
                <tr>
                    <td><label for="alumnos">Alumnos</label></td>
                    <td><input type="number" name="alumnos"/></td>
                    <td><label for="fechafin">Fecha Fin</label></td> 
                    <td><input type="date" name="fechafin" /></td>
                </tr>
                <tr>
                    <td colspan="4"><input type="submit" value="Alta" /></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <a href="index.php">Inicio</a>
</section>