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
                    <td><label>Fecha de Baja</label></td>
                    <td><input type="date" name="fecBaja" id="fecBaja" /></td>
                    <td><input type="button" value="Dar de Baja" id="baja" /></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <div id="mensajeEliminar">
        <p>¿Está usted seguro de que desea dar de Baja el Helicóptero?</p>
        <input type="button" value="NO" id="noEliminar" />
        <input type="button" value="SI" id="siEliminar" />
    </div>
    <div id="inicio">
        <a href="index.php">Inicio</a>
    </div>
</section>
<script type="text/javascript" src="Views/Sections/admin/helicopteros/busqueda.js" ></script>