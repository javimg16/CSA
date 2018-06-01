<?php
    include 'Conexciones.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Personal
 *
 * @author Javi
 */
class Personal {
    //put your code here
    private $dni;
    private $nombre;
    private $apellidos;
    private $fecAlta;
    private $funcion;
    
    function __construct($dni, $nombre, $apellidos, $fecAlta, $funcion) {
        $this -> dni = $dni;
        $this -> nombre = $nombre;
        $this -> apellidos = $apellidos;
        $this -> fecAlta = $fecAlta;
        $this -> funcion = $funcion;
    }

    function getDni() {
        return $this -> dni;
    }

    function getNombre() {
        return $this -> nombre;
    }

    function getApellidos() {
        return $this -> apellidos;
    }

    function getFecAlta() {
        return $this -> fecAlta;
    }

    function getFuncion() {
        return $this -> funcion;
    }

    function setDni($dni) {
        $this -> dni = $dni;
    }

    function setNombre($nombre) {
        $this -> nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this -> apellidos = $apellidos;
    }

    function setFecAlta($fecAlta) {
        $this -> fecAlta = $fecAlta;
    }

    function setFuncion($funcion) {
        $this -> funcion = $funcion;
    }
    
    function create() {
        try{
            $conexion = Conexiones::getConexion();
            $consulta = "INSERTO INTO personal (DNI, Nombre, Apellidos, FecAlta, Funcion) "
                    . "VALUES (?,?,?,?,?)";
            $stmt = $conexion ->prepare($consulta);
            $stmt ->bind_param('sssss', $this->getDni(), $this->getNombre(), 
                    $this->getApellidos(), $this->getFecAlta(), $this->getFuncion());
            $stmt ->execute();
        } catch (Exception $e) {
            echo "Error al insertar datos en tabla personal".$e ->getMessage();
        }
    }
}
?>