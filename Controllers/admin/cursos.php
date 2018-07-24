<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$modelo = $_REQUEST['modelo'];
$fechaini = $_REQUEST['fechaini'];
$alumnos = $_REQUEST['alumnos'];
$fechafin = $_REQUEST['fechafin'];

$curso = new Cursos($modelo, $fechaini, $fechafin, $alumnos);

$curso -> create();

?>