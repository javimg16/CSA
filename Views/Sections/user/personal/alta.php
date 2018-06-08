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
                    <td><input type="text" name="apellidos"/></td>
                </tr>
                <tr>
                    <td><label for="fechaalta">Fecha de Alta</label></td>
                    <td><input type="date" name="fechaalta"/></td>
                    <td>
                        <select name="funcion">
                            <option value="piloto">Piloto</option>
                            <option value="mecanico">Mecanico</option>
                            <option value="pasajero">Pasajero</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <label for="cursos">Cursos</label>
                    <td><input type="radio" name="modelo" value="modelo1"/>Modelo 1</td>
                    <td><input type="radio" name="modelo" value="modelo2"/>Modelo 2</td>
                    <td><input type="radio" name="modelo" value="modelo3"/>Modelo 3</td>
                    <td><input type="radio" name="modelo" value="modelo4"/>Modelo 4</td>
                </tr>
                <tr>
                    <td><input type="submit" value="Dar de alta"/></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <a href="index.php">Inicio</a>
</section>