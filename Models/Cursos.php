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
    
    public $modelo;
    public $fecIni;
    public $fecFin;
    public $numAlumnos;
    
    public function __construct0(){}
    
            
    public function __construct1($modelo, $fecIni, $fecFin, $numAlumnos) {
        $this -> modelo = $modelo;
        $this -> fecIni = $fecIni;
        $this -> fecFin = $fecFin;
        $this -> numAlumnos = $numAlumnos;
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
    
    function retriveAll() {
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT Modelo, FecIni, FecFin, numAlumnos FROM cursos";
            $stmt = $conexion -> prepare($consulta);
            $stmt ->execute();
            $resultado = $stmt -> get_result();
            $envio = $resultado -> fetch_array();
            return $envio;
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
}
?>