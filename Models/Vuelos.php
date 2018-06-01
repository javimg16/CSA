<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vuelos
 *
 * @author Javi
 */
class Vuelos {
    //put your code here
    
    private $numRegistro;
    private $fecVuelo;
    private $tiempo;
    private $modalidad;
    private $zona;
    private $matricula;
    
    
    function __construct($numRegistro, $fecVuelo, $tiempo, $modalidad, $zona, $matricula) {
        $this -> numRegistro = $numRegistro;
        $this -> fecVuelo = $fecVuelo;
        $this -> tiempo = $tiempo;
        $this -> modalidad = $modalidad;
        $this -> zona = $zona;
        $this -> matricula = $matricula;
    }

    function getNumRegistro() {
        return $this -> numRegistro;
    }

    function getFecVuelo() {
        return $this -> fecVuelo;
    }

    function getTiempo() {
        return $this -> tiempo;
    }

    function getModalidad() {
        return $this -> modalidad;
    }

    function getZona() {
        return $this -> zona;
    }

    function getMatricula() {
        return $this -> matricula;
    }

    function setNumRegistro($numRegistro) {
        $this -> numRegistro = $numRegistro;
    }

    function setFecVuelo($fecVuelo) {
        $this -> fecVuelo = $fecVuelo;
    }

    function setTiempo($tiempo) {
        $this -> tiempo = $tiempo;
    }

    function setModalidad($modalidad) {
        $this -> modalidad = $modalidad;
    }

    function setZona($zona) {
        $this -> zona = $zona;
    }

    function setMatricula($matricula) {
        $this -> matricula = $matricula;
    }


}
?>