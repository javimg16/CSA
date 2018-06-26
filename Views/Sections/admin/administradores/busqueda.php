<section>
    <div class="busqueda">
        <label>Introduce el administrador</label>
        <input type="text" id="id"/>
        <input type="button" value="Buscar" id="buscar" />
    </div>
    <div id="resulOk"></div>
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
    <div id="mensaje"></div>
    <div id="inicio">
        <a href="index.php">Inicio</a>
    </div>
</section>
<script src="Libreries/jquery/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="Libreries/jquery/jquery-ui-1.12.1.custom/jquery-ui.css" >
<script src="Libreries/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script type="text/javascript" src="Views/Sections/admin/administradores/busqueda.js" ></script>