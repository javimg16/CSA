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
      
    public function __construct($modelo, $fecIni, $fecFin, $numAlumnos) {
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
    
    function getNumAlumnos() {
        return $this-> numAlumnos;
    }

    function setNumAlumnos($numAlumnos) {
        $this-> numAlumnos = $numAlumnos;
    }
    
    function create() {
        try {
            $conexiones = Conexiones::getConexion();
            $consulta = "INSERT INTO cursos (Modelo, FecIni, FecFin, numAlumnos)"
                    ." VALUES (?, ?, ?, ?)";
            $stmt = $conexiones -> prepare($consulta);
            $modelo = $this -> getModelo();
            $fechaini = $this -> getFecIni();
            $alumnos = $this -> getNumAlumnos();
            $fechafin = $this -> getFecFin();
            $stmt -> bind_param('sssi', $modelo, $fechaini, $fechafin, $alumnos);
            $stmt -> execute();
            
        } catch (Exception $ex) {
            echo $ex;
        }   
    }
    
    
    static function retriveAll() {
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT Modelo, FecIni, FecFin, numAlumnos FROM cursos";
            $stmt = $conexion -> prepare($consulta);
            $stmt -> execute();
            $resultado = $stmt ->get_result();
            $envio = array();
            while($fila = $resultado -> fetch_array()){
                array_push($envio, $fila);
            }
            return $envio;
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    static function modelos(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT Modelo FROM modelos";
            $stmt = $conexion -> prepare($consulta);
            $stmt -> execute();
            $resultado = $stmt ->get_result();
            return $resultado;
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
}
?>