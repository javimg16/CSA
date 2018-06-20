<?php

class Helicopteros {
    //put your code here
    private $matricula;
    private $simulador;
    private $fecAlta;
    private $fecBaja;
    private $modelo;
    
    function __construct($matricula) {
        $this -> matricula = $matricula;
//        $this -> simulador = $simulador;
//        $this -> fecAlta = $fecAlta;
//        $this -> modelo = $modelo;
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
    
    function update(){
        try {
            
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    
    function delete(){
        try {
            
        } catch (Exception $ex) {
            echo $ex;
        }
    }
}
?>