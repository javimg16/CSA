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
    
    public $numRegistro;
    public $fecVuelo;
    public $tiempo;
    public $modalidad;
    public $zona;
    public $matricula;
    
    
    function __construct($numRegistro) {
        $this -> numRegistro = $numRegistro;
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

    // Inserta los datos del vuelo en la tabla 'vuelos'
    function create(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "INSERT INTO vuelos (NumRegistro, FecVuelo, Tiempo, Modalidad, "
                    ."Zona, Matricula) VALUES (?,?,?,?,?,?)";
            $stmt = $conexion -> prepare($consulta);
            $numRegistro = $this -> getNumRegistro();
            $fecVuelo = $this-> getFecVuelo();
            $tiempo = $this -> getTiempo();
            $modalidad = $this -> getModalidad();
            $zona = $this -> getZona();
            $matricula = $this -> getMatricula();
            $stmt -> bind_param('isdsss', $numRegistro, $fecVuelo, $tiempo, $modalidad, 
                $zona, $matricula);
            $stmt -> execute();
            
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Busqueda de un vuelo
    function retrive(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT NumRegistro, FecVuelo, Tiempo, Modalidad, Zona,"
                ." Matricula FROM vuelos WHERE NumRegistro = ?";
            $stmt = $conexion -> prepare($consulta);
            $registro = $this -> getNumRegistro();
            $stmt -> bind_param('i', $registro);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            $resultado = $resultado ->fetch_array();
            return $resultado;
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    
    // Modifica un vuelo
    function update(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "UPDATE vuelos SET FecVuelo = ?, Tiempo = ?, Modalidad = ?, "
                ."Zona = ?, Matricula = ? WHERE NumRegistro = ?";
            $stmt = $conexion -> prepare($consulta);
            $fecha = $this ->getFecVuelo();
            $tiempo = $this ->getTiempo();
            $modalidad = $this ->getModalidad();
            $matricula = $this ->getMatricula();
            $zona = $this ->getZona();
            $registro = $this ->getNumRegistro();
            $stmt -> bind_param('sdsssi', $fecha, $tiempo, $modalidad, $zona, 
                $matricula, $registro);
            $stmt -> execute();
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Borra un vuelo
    function delete(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "DELETE FROM vuelos WHERE NumRegistro = ?";
            $stmt = $conexion -> prepare($consulta);
            $numRegistro = $this-> getNumRegistro();
            $stmt -> bind_param('i', $numRegistro);
            $stmt -> execute();
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Inserta el dni y el numero de vuelo en la tabla 'vuelos_personal'
    function altaPersonal($dni){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "INSERT INTO vuelos_personal (NumRegistro, DNI) VALUES (?,?)";
            $stmt = $conexion -> prepare($consulta);
            $registro = $this -> getNumRegistro();
            $stmt -> bind_param('is', $registro, $dni);
            $stmt -> execute();
            
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Busqueda el numero de vuelo en la tabla 'vuelos_personal' y devuelve toda la tripulación
    function busquedaPersonal(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT DNI FROM vuelos_personal WHERE NumRegistro = ?";
            $stmt = $conexion -> prepare($consulta);
            $registro = $this -> getNumRegistro();
            $stmt -> bind_param('i', $registro);
            $stmt -> execute();
            $resultado = $stmt ->get_result();
            $tripu = array();
            while($personal = $resultado -> fetch_object()){
                array_push($tripu, $personal -> DNI);
            }
            return $tripu;
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Borra el dni y el número de vuelo en la tabla 'vuelos_personal'
    function bajaPersonal($dni){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "DELETE FROM vuelos_personal WHERE DNI = ?";
            $stmt = $conexion -> prepare($consulta);
            $stmt -> bind_param('s', $dni);
            if($stmt -> execute()){
                return true;
            } else {
                return false;
            }
            
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Devuelve el último número de registro de la taba 'vuelos'
    static public function ultimo() {
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT MAX(NumRegistro) FROM vuelos";
            $resultado = $conexion ->query($consulta);
            while ($fila = $resultado -> fetch_array()){
                $siguiente = $fila;
            }
            return $siguiente['MAX(NumRegistro)'];
        } catch (Exception $ex) {
            echo $ex;
        }
    }
}
?>