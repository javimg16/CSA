<section>
    <div id="listado">
        <fieldset>
            <legend>LISTADO DE HELICÓPTEROS</legend>
            <table id="lista">
                <thead>
                    <th>MATRÍCULA</th>
                    <th>MODELO</th>
                    <th>FECHA DE ALTA</th>
                    <th>FECHA DE BAJA</th>
                    <th>HORAS VOLADAS</th>
                    <th>SIMULADOR</th>
                </thead>
                    <?php
                        $helos = Helicopteros::listado();
                        while($fila = $helos -> fetch_Array()){
                            print("<tr>");
                            print("<td>".$fila['Matricula']."</td>");
                            print("<td>".$fila['Modelo']."</td>");
                            print("<td>".$fila['FecAlta']."</td>");
                            print("<td>".$fila['FecBaja']."</td>");
                            print("<td>".$fila['SUM(vu.Tiempo)']."</td>");
                            print("<td>".$fila['Simulador']."</td>");
                            print("</tr>");
                        }
                    ?>
            </table>
        </fieldset>
    </div>
    <div id="inicio">
        <a href="index.php">Inicio</a>
    </div>
</section>