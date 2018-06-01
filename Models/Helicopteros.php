<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helicopteros
 *
 * @author Javi
 */
class Helicopteros {
    //put your code here
    private $matricula;
    private $simulador;
    private $fecAlta;
    private $fecBaja;
    private $modelo;
    
    function __construct($matricula, $simulador, $fecAlta, $fecBaja, $modelo) {
        $this -> matricula = $matricula;
        $this -> simulador = $simulador;
        $this -> fecAlta = $fecAlta;
        $this -> fecBaja = $fecBaja;
        $this -> modelo = $modelo;
    }

    function getMatricula() {
        return $this -> matricula;
    }

    function getSimulador() {
        return $this -> simulador;
    }

    function getFecAlta() {
        return $this -> fecAlta;
    }

    function getFecBaja() {
        return $this -> fecBaja;
    }

    function getModelo() {
        return $this -> modelo;
    }

    function setMatricula($matricula) {
        $this -> matricula = $matricula;
    }

    function setSimulador($simulador) {
        $this -> simulador = $simulador;
    }

    function setFecAlta($fecAlta) {
        $this -> fecAlta = $fecAlta;
    }

    function setFecBaja($fecBaja) {
        $this -> fecBaja = $fecBaja;
    }

    function setModelo($modelo) {
        $this -> modelo = $modelo;
    }


    
    
}
?>