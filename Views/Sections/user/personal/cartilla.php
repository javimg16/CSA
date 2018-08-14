<section>
    <div id="cartilla">
        <div id="datospersonales">
            <fieldset>
                <legend>Datos personales</legend>
                <table>
                    <tr>
                        <td id="dni"><?php echo $cartilla -> dni ?></td>
                        <td id="nombre"><?php echo $cartilla -> nombre." ".$cartilla -> apellidos ?></td>
                        <td id="funcion"><?php echo ucfirst($cartilla -> funcion) ?></td>
                        <td>Cartilla a <a id="fecha"><?php echo date_format(date_create($cartilla -> fecha), "d-m-Y") ?></a></td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <div id="modelos">
            <fieldset>
                <legend>Modelos</legend>
                <table>
                    <thead>
                        <th></th>
                        <th>HE-26</th>
                        <th>HR-12</th>
                        <th>HT-17</th>
                        <th>HU-10</th>
                        <th>TOTAL</th>
                    </thead>
                    <tr>
                        <td>MES</td>
                        <td id="mesmodel1"><?php echo $cartilla -> horas["model"]["mes"][0] ?></td>
                        <td id="mesmodel2"><?php echo $cartilla -> horas["model"]["mes"][1] ?></td>
                        <td id="mesmodel3"><?php echo $cartilla -> horas["model"]["mes"][2] ?></td>
                        <td id="mesmodel4"><?php echo $cartilla -> horas["model"]["mes"][3] ?></td>
                        <td id="mesmodeltotal"><?php echo $cartilla -> horas["model"]["mes"][4] ?></td>
                    </tr>
                    <tr>
                        <td>AÑO</td>
                        <td id="annomodel1"><?php echo $cartilla -> horas["model"]["anno"][0] ?></td>
                        <td id="annomodel2"><?php echo $cartilla -> horas["model"]["anno"][1] ?></td>
                        <td id="annomodel3"><?php echo $cartilla -> horas["model"]["anno"][2] ?></td>
                        <td id="annomodel4"><?php echo $cartilla -> horas["model"]["anno"][3] ?></td>
                        <td id="annomodeltotal"><?php echo $cartilla -> horas["model"]["anno"][4] ?></td>
                    </tr>
                    <tr>
                        <td>TOTALES</td>
                        <td id="totalesmodel1"><?php echo $cartilla -> horas["model"]["total"][0] ?></td>
                        <td id="totalesmodel2"><?php echo $cartilla -> horas["model"]["total"][1] ?></td>
                        <td id="totalesmodel3"><?php echo $cartilla -> horas["model"]["total"][2] ?></td>
                        <td id="totalesmodel4"><?php echo $cartilla -> horas["model"]["total"][3] ?></td>
                        <td id="totalesmodeltotal"><?php echo $cartilla -> horas["model"]["total"][4] ?></td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <div id="modalidad">
            <fieldset>
                <legend>Modalidad</legend>
                <table>
                    <thead>
                        <th></th>
                        <th>Transporte de Personal</th>
                        <th>Transporte de Carga</th>
                        <th>Recorrido</th>
                        <th>TOTAL</th>
                    </thead>
                    <tr>
                        <td>MES</td>
                        <td id="mesmodal1"><?php echo $cartilla -> horas["modal"]["mes"][0] ?></td>
                        <td id="mesmodal2"><?php echo $cartilla -> horas["modal"]["mes"][1] ?></td>
                        <td id="mesmodal3"><?php echo $cartilla -> horas["modal"]["mes"][2] ?></td>
                        <td id="mesmodaltotal"><?php echo $cartilla -> horas["modal"]["mes"][3] ?></td>
                    </tr>
                    <tr>
                        <td>AÑO</td>
                        <td id="annomodal1"><?php echo $cartilla -> horas["modal"]["anno"][0] ?></td>
                        <td id="annomodal2"><?php echo $cartilla -> horas["modal"]["anno"][1] ?></td>
                        <td id="annomodal3"><?php echo $cartilla -> horas["modal"]["anno"][2] ?></td>
                        <td id="annomodaltotal"><?php echo $cartilla -> horas["modal"]["anno"][3] ?></td>
                    </tr>
                    <tr>
                        <td>TOTALES</td>
                        <td id="totalesmodal1"><?php echo $cartilla -> horas["modal"]["total"][0] ?></td>
                        <td id="totalesmodal2"><?php echo $cartilla -> horas["modal"]["total"][1] ?></td>
                        <td id="totalesmodal3"><?php echo $cartilla -> horas["modal"]["total"][2] ?></td>
                        <td id="totalesmodaltotal"><?php echo $cartilla -> horas["modal"]["total"][3] ?></td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <div id="zona">
            <fieldset>
                <legend>Zonas</legend>
                <table>
                    <thead>
                        <th></th>
                        <th>Madrid</th>
                        <th>Barcelona</th>
                        <th>Bilbao</th>
                        <th>TOTAL</th>
                    </thead>
                    <tr>
                        <td>MES</td>
                        <td id="meszona1"><?php echo $cartilla -> horas["zonas"]["mes"][0] ?></td>
                        <td id="meszona2"><?php echo $cartilla -> horas["zonas"]["mes"][1] ?></td>
                        <td id="meszona3"><?php echo $cartilla -> horas["zonas"]["mes"][2] ?></td>
                        <td id="meszonatotal"><?php echo $cartilla -> horas["zonas"]["mes"][3] ?></td>
                    </tr>
                    <tr>
                        <td>AÑO</td>
                        <td id="annozona1"><?php echo $cartilla -> horas["zonas"]["anno"][0] ?></td>
                        <td id="annozona2"><?php echo $cartilla -> horas["zonas"]["anno"][1] ?></td>
                        <td id="annozona3"><?php echo $cartilla -> horas["zonas"]["anno"][2] ?></td>
                        <td id="annozonatotal"><?php echo $cartilla -> horas["zonas"]["anno"][3] ?></td>
                    </tr>
                    <tr>
                        <td>TOTALES</td>
                        <td id="totaleszona1"><?php echo $cartilla -> horas["zonas"]["total"][0] ?></td>
                        <td id="totaleszona2"><?php echo $cartilla -> horas["zonas"]["total"][1] ?></td>
                        <td id="totaleszona3"><?php echo $cartilla -> horas["zonas"]["total"][2] ?></td>
                        <td id="totaleszonatotal"><?php echo $cartilla -> horas["zonas"]["total"][3] ?></td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <div id="totales">
            <fieldset>
                <legend>TOTALES</legend>
                <table>
                    <thead>
                        <th></th>
                        <th>Real</th>
                        <th>Simulador</th>
                        <th>TOTAL</th>
                    </thead>
                    <tr>
                        <td>MES</td>
                        <td id="mestotalesreal"><?php echo $cartilla -> horas["totales"]["mes"][0] ?></td>
                        <td id="mestotalessimulador"><?php echo $cartilla -> horas["totales"]["mes"][1] ?></td>
                        <td id="mestotalestotal"><?php echo $cartilla -> horas["totales"]["mes"][2] ?></td>
                    </tr>
                    <tr>
                        <td>AÑO</td>
                        <td id="annototalesreal"><?php echo $cartilla -> horas["totales"]["anno"][0] ?></td>
                        <td id="annototalessimulador"><?php echo $cartilla -> horas["totales"]["anno"][1] ?></td>
                        <td id="annototalestotal"><?php echo $cartilla -> horas["totales"]["anno"][2] ?></td>
                    </tr>
                    <tr>
                        <td>TOTALES</td>
                        <td id="totalestotalesreal"><?php echo $cartilla -> horas["totales"]["total"][0] ?></td>
                        <td id="totalestotalessimulador"><?php echo $cartilla -> horas["totales"]["total"][1] ?></td>
                        <td id="totalestotalestotal"><?php echo $cartilla -> horas["totales"]["total"][2] ?></td>
                    </tr>
                </table>
            </fieldset>
        </div>
    </div>
    <div id="inicio">
        <a href="index.php?opcion=personal&accion=imprimir&dni=<?php 
            echo $cartilla -> dni?>&fecha=<?php 
            echo $cartilla -> fecha ?>" class="ui-button ui-widget ui-corner-all" id="pdf">Guardar en PDF</a>
    </div>
</section>
<script src="Libreries/jquery/jquery-3.2.1.min.js"></script>
<script src="Libreries/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<!--<script type="text/javascript" src="JS/cartilla.js" ></script>-->