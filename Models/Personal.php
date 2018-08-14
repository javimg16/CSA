<?php
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
    
    function __construct($dni) {
        $this -> dni = $dni;
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
    
    function retrive($dni){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT DNI, Nombre, Apellidos, FecAlta, Funcion "
                . "FROM personal WHERE DNI = ?";
            $stmt = $conexion -> prepare($consulta);
            $stmt -> bind_param('s', $dni);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            $resultado = $resultado ->fetch_array();
            return $resultado;
        } catch (Exception $e) {
            echo "Error al cargar los datos de la tabla personal ".$e -> getMessage();
        }
    }
    
    function update($nombre, $apellidos, $fecAlta, $funcion){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "UPDATE personal SET Nombre = ?, Apellidos = ?, "
                    . "FecAlta = ?, Funcion = ? WHERE DNI = ?";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this ->getDni();
            $stmt -> bind_param('sssss', $nombre, $apellidos, $fecAlta, $funcion, $dni);
            $stmt -> execute();
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    function delete(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "DELETE FROM personal WHERE DNI = ?";
            $dni = $this -> dni;
            $stmt = $conexion -> prepare($consulta);
            $stmt ->bind_param('s', $dni);
            if($stmt -> execute()){
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex){
            echo $ex;
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
    
    function retriveMod() {
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT Modelo FROM cursos_personal WHERE DNI = ?";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> dni;
            $stmt -> bind_param('s', $dni);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            $envio = array();
            while ($fila = $resultado -> fetch_array()){
                array_push($envio, $fila);
            }
            return $envio;
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    function delMod(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "DELETE FROM cursos_personal WHERE DNI = ?";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> dni;
            $stmt ->bind_param('s', $dni);
            $stmt -> execute();
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    function datosPersonales(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT DNI, Nombre, Apellidos, FecAlta, Funcion FROM personal "
                ."WHERE DNI = ?";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $stmt -> bind_param('s', $dni);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            while($datos = $resultado -> fetch_object()){
                $this -> setNombre($datos -> Nombre);
                $this -> setApellidos($datos -> Apellidos);
                $this -> setFuncion($datos -> Funcion);
                $this -> setFecAlta($datos -> FecAlta);
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
}
?>