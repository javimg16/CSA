<section>
    <div id="listado">
        <fieldset>
            <legend>LISTADO DE CURSOS</legend>
            <table id="lista">
                <thead>
                    <th>MODELO</th>
                    <th>FECHA DE INICIO</th>
                    <th>FECHA DE FINALIZACIÓN</th>
                    <th>TOTAL DE ALUMNOS</th>
                </thead>
                    <?php
//                        $cursos = new Cursos();
                        foreach (Cursos::retriveAll() as $curso => $fila) {
                            print("<tr>");
                            print("<td>".$fila['Modelo']."</td>");
                            print("<td>".$fila['FecIni']."</td>");
                            print("<td>".$fila['FecFin']."</td>");
                            print("<td>".$fila['numAlumnos']."</td>");
                            print("</tr>");
                        }
                    ?>
            </table>
        </fieldset>
    </div>
    <div>
        <a href="index.php?opcion=cursos&accion=alta" class="ui-button ui-widget ui-corner-all" >Nuevo Curso</a>
    </div>
    <div id="inicio">
        <a href="index.php" class="ui-button ui-widget ui-corner-all" >Inicio</a>
    </div>
</section>