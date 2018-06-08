<section>
    <form>
        <fieldset>
            <legend>Alta Nuevo Vuelo</legend>
            <table>
                <tr>
                    <td><label for="registro">Registro Núm: </label></td>
                    <td><label for="fecha">Fecha </label></td>
                    <td><input type="date" name="fecha"/></td> 
                    <td><label for="tiempo">Tiempo </label></td>
                    <td><input type="text" name="tiempo"/></td>
                </tr>
                <tr>
                    <td><label for="matricula">Matricula: </label></td>
                    <td>
                        <select name="matricula">
                            <option value=" "> </option>
                            <option value=" "> </option>
                            <option value=" "> </option>
                        </select>
                    </td>
                    <td><label for="modelo">Modelo: </label></td>
                    <td><label for="modalidad">Modalidad </label></td>
                    <td>
                        <select name="modalidad">
                            <option value="transportepersonal">Transporte Personal </option>
                            <option value="transportecarga">Transporte de Carga</option>
                            <option value="recorrido">Recorrido</option>
                        </select>
                    </td>
                    <td><label for="zona">Zona </label></td>
                     <td>
                        <select name="zona">
                            <option value="madrid">Madrid</option>
                            <option value="barcelona">Barcelona</option>
                            <option value="bilbao">Bilbao</option>
                        </select>
                    </td>
                </tr>
                <tr>  
                    <td><input type="submit" value="Guardar"/></td>
                    <td><input type="submit" value="Borrar datos"/></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <a href="index.php">Inicio</a>
</section>