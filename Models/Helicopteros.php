<?php

class Helicopteros {
    //put your code here
    public $matricula;
    public $simulador;
    public $fecAlta;
    public $fecBaja;
    public $modelo;
    
    
            
    function __construct($matricula) {
        $this -> matricula = $matricula;
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

    function create(){
        try {
            $conexiones = Conexiones::getConexion();
            $consulta = "INSERT INTO helicopteros (Matricula, Simulador, FecAlta, "
                    . "Modelo) VALUES (?, ?, ?, ?)";
            $stmt = $conexiones -> prepare($consulta);
            $matricula = $this -> getMatricula();
            $simulador = $this -> getSimulador();
            $fecAlta = $this -> getFecAlta();
            $modelo = $this -> getModelo();
            $stmt -> bind_param('siss', $matricula, $simulador, $fecAlta, $modelo);
            if($stmt -> execute())
                return true;
            else
                return false;
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    function retrive($matricula){
        try {
            $conexiones = Conexiones::getConexion();
            $consulta = "SELECT Matricula, Simulador, FecAlta, FecBaja, Modelo "
                    . "FROM Helicopteros WHERE Matricula LIKE ?";
            $stmt = $conexiones -> prepare($consulta);
            $stmt -> bind_param('s', $matricula);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            $envio = $resultado -> fetch_array();
            return $envio;
        } catch (Exception $e) {
            echo $e;
        }
    }
    
    function update($matricula, $fecBaja){
        try {
            $conexiones = Conexiones::getConexion();
            $consulta = "UPDATE helicopteros SET FecBaja = ? WHERE Matricula = ?";
            $stmt = $conexiones -> prepare($consulta);
            $stmt -> bind_param('ss', $fecBaja, $matricula);
            if ($stmt -> execute()){
                return true;
            } else {
                return false;
            }
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
    
    static function listado(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT he.Matricula, he.Modelo, he.FecAlta, he.FecBaja, "
                ."SUM(vu.Tiempo), he.Simulador FROM helicopteros he, vuelos vu "
                ."WHERE he.Matricula = vu.Matricula GROUP BY he.Matricula";
            $stmt = $conexion -> prepare($consulta);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            return $resultado;
        } catch (Exception $ex) {
            echo $ex;
        }
    }
}
?>