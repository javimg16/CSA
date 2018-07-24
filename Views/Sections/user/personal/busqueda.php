<section>
    <div class="busqueda">
        <label>Introduce el DNI</label>
        <input type="text" id="id"/>
        <input type="button" value="Buscar" id="buscar" />
    </div>
    <div id="resulOk"></div>
    <form id="resultado">
        <fieldset>
            <legend>Resultado Busqueda de Personal</legend>
            <table>
                <table>
                <tr>
                    <td><label for="dni">DNI</label></td>
                    <td><input type="text" name="dni" id="dni"/></td>
                    <td><label for="nombre">Nombre </label></td>
                    <td><input type="text" name="nombre" id="nombre" /></td>                    
                </tr>
                <tr>
                    <td><label for="apellidos">Apellidos</label></td>
                    <td colspan="3"><input type="text" name="apellidos" size="70" id="apellidos"/></td>
                </tr>
                <tr>
                    <td><label for="fecAlta">Fecha de Alta</label></td>
                    <td><input type="date" name="fecAlta" id="fecAlta" /></td>
                    <td><label for="funcion">Función a Bordo</label></td>
                    <td>
                        <select name="funcion" id="funcion">
                            <option value="piloto">Piloto</option>
                            <option value="mecanico">Mecanico</option>
                            <option value="pasajero">Pasajero</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="cursos">Cursos</label></td>
                </tr>
                <tr>
                    <?php
                        $modelos = Helicopteros::modelos();
                        while($fila = $modelos -> fetch_array()){
                            print("<tr><td><input type=\"radio\" name=\"".$fila['Modelo']."\" "
                                ."value=\"".$fila['Modelo']."\" id=\"".$fila['Modelo']
                                ."\" />".$fila['Modelo']."</td></tr>");
                        }
                    ?>
                </tr>
                <tr>
                    <td><input type="button" value="Modificar" id="modificar" /></td>
                    <td><input type="button" value="Borrar" id="borrar" /></td>
                    <td><input type="button" value="Cartilla de Vuelos" id="cartilla" /></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <div id="mensaje"></div>
    <div id="inicio">
        <a href="index.php">Inicio</a>
    </div>
</section>
<script src="Libreries/jquery/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="Libreries/jquery/jquery-ui-1.12.1.custom/jquery-ui.css" >
<script src="Libreries/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script type="text/javascript" src="JS/personal.js" ></script>