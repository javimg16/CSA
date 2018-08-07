<section>
    <form>
        <fieldset>
            <legend>Busqueda de vuelo</legend>
            <label>Introduce el número de vuelo</label>
            <input type="text" id="numBusqueda" />
            <input type="button" id="buscarVuelo" value="Buscar" class="ui-button ui-widget ui-corner-all" />
        </fieldset>
    </form>
    <form id="resultado">
        <fieldset>
            <legend>Resultado de la busqueda:</legend>
            <table>
                <tr>
                    <td><label for="registro">Registro Núm: </label></td>
                    <td><input type="text" id="registro" disabled /></td>
                    <td><label for="fecha">Fecha </label></td>
                    <td><input type="date" name="fecha" id="fecha" /></td> 
                    <td><label for="tiempo">Tiempo </label></td>
                    <td><input type="text" name="tiempo" id="tiempo" size="4" /></td>
                </tr>
                <tr>
                    <td><label for="matricula">Matricula: </label></td>
                    <td>
                        <select name="matricula" id="matricula">
                            <?php
                                $matriculas = Helicopteros::matriculas();
                                while ($fila = $matriculas -> fetch_array()) {
                                    print("<option value=".$fila['Matricula']." >".$fila['Matricula']."</option>");
                                }
                            ?>
                        </select>
                    </td>
                    <td><label for="modelo">Modelo: </label></td>
                    <td><input type="text" name="modelo" id="modelo" disabled /></td>
                </tr>
                <tr>
                    <td><label for="modalidad">Modalidad </label></td>
                    <td>
                        <select name="modalidad" id="modalidad">
                            <option value="transportepersonal">Transporte Personal </option>
                            <option value="transportecarga">Transporte de Carga</option>
                            <option value="recorrido">Recorrido</option>
                        </select>
                    </td>
                    <td><label for="zona">Zona </label></td>
                     <td>
                        <select name="zona" id="zona">
                            <option value="madrid">Madrid</option>
                            <option value="barcelona">Barcelona</option>
                            <option value="bilbao">Bilbao</option>
                        </select>
                    </td>
                </tr>
                <tr>  
                    <td><input type="button" value="Modificar Vuelo" id="modificar" class="ui-button ui-widget ui-corner-all" /></td>
                    <td><input type="button" value="Borrar Vuelo" id="borrar" class="ui-button ui-widget ui-corner-all" /></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <div id="resulOk"></div>
    <div id="personal">
        <fieldset id="tripulacion">
            <legend id="leyenda">PERSONAL DEL VUELO</legend>
            <input type="button" id="agregar" value="Agregar" class="ui-button ui-widget ui-corner-all" />
        </fieldset>
        <input type="button" id="nuevo" value="Nuevo Vuelo" class="ui-button ui-widget ui-corner-all" />
    </div>
    <div id="busqueda" title="Busqueda de Personal">
        <form>
            <label for="dni">Introduce el dni</label>
            <input type="text" id="dni" />
            <input type="button" id="buscar" value="Buscar" class="ui-button ui-widget ui-corner-all" />
        </form>
    </div>
    <div id="confirmacion"></div>
    <a href="index.php" class="ui-button ui-widget ui-corner-all" >Inicio</a>
</section>
<script src="Libreries/jquery/jquery-3.2.1.min.js"></script>
<script src="Libreries/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script type="text/javascript" src="JS/vuelos.js" ></script>