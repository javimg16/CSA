<section>
    <div class="busqueda">
        <label>Introduce el administrador</label>
        <input type="text" id="id"/>
        <input type="button" value="Buscar" id="buscar" />
    </div>
    <form id="resultado">
        <fieldset>
            <legend>Resultado Busqueda Administradores</legend>
            <table>
                <tr>
                    <td><label>Administrador</label></td>
                    <td><input type="text" name="administrador" id="administrador" /></td>
                    <td><label>Contraseña</label></td>
                    <td><input type="text" name="contra" id="contra" /></td>
                </tr>
                <tr>
                    <td><label>Correo</label></td>
                    <td colspan="3"><input type="text" name="correo" id="correo" size="60" /></td>
                </tr>
                <tr>
                    <td><input type="button" value="Modificar" id="modificar" /></td>
                    <td><input type="button" value="Eliminar" id="eliminar" /></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <div id="mensaje">
        <p>¿Está usted seguro de que desea eliminar?</p>
        <input type="button" value="NO" id="no" />
        <input type="button" value="SI" id="si" />
    </div>
    <div id="inicio">
        <a href="index.php">Inicio</a>
    </div>
</section>
<script type="text/javascript" src="Views/Sections/admin/administradores/busqueda.js" ></script>