<section>
    <form>
        <fieldset>
            <legend>Alta Nuevo Personal</legend>
            <table>
                <tr>
                    <td><label for="dni">DNI</label></td>
                    <td><input type="text" name="dni"/></td>
                    <td><label for="nombre">Nombre </label></td>
                    <td><input type="text" name="nombre"/></td>                    
                </tr>
                <tr>
                    <td><label for="apellidos">Apellidos</label></td>
                    <td colspan="3"><input type="text" name="apellidos" size="70"/></td>
                </tr>
                <tr>
                    <td><label for="fechaalta">Fecha de Alta</label></td>
                    <td><input type="date" name="fechaalta"/></td>
                    <td><label for="funcion">Función a Bordo</label></td>
                    <td>
                        <select name="funcion">
                            <option value="piloto">Piloto</option>
                            <option value="mecanico">Mecanico</option>
                            <option value="pasajero">Pasajero</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="cursos">Cursos</label></td>
                </tr>
                    <?php
                        $modelos = Helicopteros::modelos();
                        while($fila = $modelos -> fetch_array()){
                            print("<tr><td><input type=\"radio\" name=\"".$fila['Modelo']."\" "
                                ."value=\"".$fila['Modelo']."\" />".$fila['Modelo']."</td></tr>");
                        }
                    ?>
                <tr>
                    <td><input type="submit" value="Dar de alta"/></td>
                    <td><input type="reset" value="Restaurar Formulario"/></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <a href="index.php">Inicio</a>
</section>