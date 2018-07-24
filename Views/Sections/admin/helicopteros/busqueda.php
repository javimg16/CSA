<section>
    <div class="busqueda">
        <label>Introduce la Matrícula</label>
        <input type="text" id="id"/>
        <input type="button" value="Buscar" id="buscar" />
    </div>
    <div id="resulOk"></div>
    <form id="resultado">
        <fieldset>
            <legend>Resultado Busqueda de Helicópteros</legend>
            <table>
                <tr>
                    <td><label>Matrícula</label></td>
                    <td><input type="text" name="matricula" id="matricula" disabled /></td>
                    <td><label>Modelo</label></td>
                    <td><input type="text" name="modelo" id="modelo" disabled /></td>
                    <td><label>Fecha de Alta</label></td>
                    <td><input type="date" name="fecAlta" id="fecAlta" disabled /></td>
                </tr>
                <tr>
                    <td><label>¿Es un simulador?</label></td>
                    <td><input type="checkbox" name="simulador" id="simulador" disabled /></td>
                    <td><label>Fecha de Baja</label></td>
                    <td><input type="date" name="fecBaja" id="fecBaja" /></td>
                    <td><input type="button" value="Dar de Baja" id="baja" /></td>
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
<script type="text/javascript" src="JS/helos.js" ></script>