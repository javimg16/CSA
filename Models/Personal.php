<?php
    //include 'Conexiones.php';
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
    public $dni;
    public $nombre;
    public $apellidos;
    public $fecAlta;
    public $funcion;
    
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
            $consulta = "INSERT INTO personal (DNI, Nombre, Apellidos, FecAlta, Funcion) "
                    . "VALUES (?,?,?,?,?)";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $nombre = $this -> getNombre();
            $apellidos = $this -> getApellidos();
            $fecAlta = $this -> getFecAlta();
            $funcion = $this -> getFuncion();
            $stmt -> bind_param('sssss', $dni, $nombre, $apellidos, $fecAlta, $funcion);
            $stmt -> execute();
        } catch (Exception $e) {
            echo "Error al insertar datos ".$e -> getMessage();
        }
    }
    
    function modelos($dni, $modelo) {
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "INSERT INTO cursos_personal (DNI, Modelo) "
                    ."VALUES (?, ?)";
            $stmt = $conexion -> prepare($consulta);
            $stmt -> bind_param('ss', $dni, $modelo);
            $stmt -> execute();
        } catch (Exception $ex) {
            "Error al insertar datos en la tabla modelos".$ex -> getMessage();
        }
    }
    
    
    function retrieve($dni){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT * FROM personal";
            $stmt = $conexion -> prepare($consulta);
            
        } catch (Exception $e) {
            echo "Error al cargar los datos de la tabla personal".$e -> getMessage();
        }
    }
}
?>