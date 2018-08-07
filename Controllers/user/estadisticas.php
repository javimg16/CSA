<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

$accion = $_REQUEST['accion'];

    // Consulta de horas de los helicópteros por Matrícula
    if($accion == "matricula"){
        $estadistica = Estadisticas::matricula();
        echo json_encode($estadistica);
    }

    // Consulta de horas de los helicópteros por Modelo
    elseif($accion == "modelo"){
        $estadistica = Estadisticas::modelo();
        echo json_encode($estadistica);
    }
    
    // Consulta de horas de los helicópteros por Año
    elseif($accion == "anno"){
        $estadistica = Estadisticas::anno();
        echo json_encode($estadistica);
    }
?>