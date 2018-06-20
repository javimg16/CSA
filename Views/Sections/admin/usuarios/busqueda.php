<section>
    <div class="busqueda">
        <label>Introduce el usuario</label>
        <input type="text" id="id"/>
        <input type="button" value="Buscar" id="buscar" />
    </div>
    <form id="resultado">
        <fieldset>
            <legend>Resultado Busqueda de Usuarios</legend>
            <table>
                <tr>
                    <td><label>Usuario</label></td>
                    <td><input type="text" name="usuario" id="usuario"/></td>
                    <td><label>Contraseña</label></td>
                    <td><input type="text" name="contra" id="contra"/></td>                    
                </tr>
                <tr>
                    <td><label>Correo</label></td>
                    <td><input type="text" name="correo" size="60"/></td>
                </tr>
                <tr>
                    <td><input type="button" value="Modificar" id="modificar"/></td>
                    <td><input type="button" value="Eliminar" id="eliminar"/></td>
                </tr>
            </table>
        </fieldset>        
    </form>    
  
</section>
<script type="text/javascript" src="Views/Sections/admin/usuarios/busqueda.js" ></script>