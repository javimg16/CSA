<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cursos
 *
 * @author Javi
 */
class Cursos {
    //put your code here
    
    private $modelo;
    private $fecIni;
    private $fecFin;
        
    function __construct($modelo, $fecIni, $fecFin) {
        $this -> modelo = $modelo;
        $this -> fecIni = $fecIni;
        $this -> fecFin = $fecFin;
    }

    function getModelo() {
        return $this -> modelo;
    }

    function getFecIni() {
        return $this -> fecIni;
    }

    function getFecFin() {
        return $this -> fecFin;
    }

    function setModelo($modelo) {
        $this -> modelo = $modelo;
    }

    function setFecIni($fecIni) {
        $this -> fecIni = $fecIni;
    }

    function setFecFin($fecFin) {
        $this -> fecFin = $fecFin;
    }
    
}
?>