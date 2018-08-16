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
                        $listado = Helicopteros::listado();
                        foreach($listado as $heli){
                            print("<tr>");
                            print("<td>".$heli[0]."</td>");
                            print("<td>".$heli[1]."</td>");
                            print("<td>".$heli[2]."</td>");
                            print("<td>".$heli[3]."</td>");
                            print("<td>".$heli[4]."</td>");
                           print("<td>".$heli[5]."</td>");
                            print("</tr>");
                        }
                    ?>
            </table>
        </fieldset>
    </div>
    <div id="inicio">
        <a href="index.php" class="ui-button ui-widget ui-corner-all">Inicio</a>
    </div>
</section>