<?php

include 'Conexiones.php';

class Gestores {
    private $id;
    private $password;
    private $administrador;
    private $correo;
    
    function __construct($id, $password, $administrador, $correo) {
        $this->id = $id;
        $this->password = $password;
        $this -> administrador = $administrador;
        $this->correo = $correo;
    }

    function getId() {
        return $this->id;
    }

    function getPassword() {
        return $this->password;
    }

    function getAdministrador() {
        return $this->administrador;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setAdministrador($administrador) {
        $this->administrador = $administrador;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function createAdmin(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "INSERT INTO gestores (ID, Password, Administrador, Correo) "
                    . "VALUES (?,?,?,?)";
            $stmt = $conexion -> prepare($consulta);
            $id = $this -> getId();
            $pass = $this -> getPassword();
            $tipo = $this -> getAdministrador();
            $email = $this -> getCorreo();
            $stmt -> bind_param('ssis', $id, $pass, $tipo, $email);
            $stmt -> execute();
        } catch (Exception $e) {
            echo "Error al insertar datos en tabla gestores".$e -> getMessage();
        }
    }
    
    static function retriveAdmin($id){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT Password, Administrador, Correo "
                    . "FROM gestores WHERE ID LIKE ?";
            $stmt = $conexion -> prepare($consulta);
            $stmt ->bind_param('s', $id);
            $stmt -> execute();
            $resultado = $stmt->get_result();
            $envio = $resultado -> fetch_array();
            return $envio;
        } catch (Exception $e) {
            echo $e;
        }
    }
    
    
    
    
    function createUser(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "INSERT INTO gestores (ID, Password, Administrador, Correo) "
                    . "VALUES (?,?,?,?)";
            $stmt = $conexion -> prepare($consulta);
            $id = $this -> getId();
            $pass = $this -> getPassword();
            $tipo = $this -> getAdministrador();
            $email = $this -> getCorreo();
            $stmt -> bind_param('ssis', $id, $pass, $tipo, $email);
            $stmt -> execute();
        } catch (Exception $e) {
            echo "Error al insertar datos en tabla gestores".$e -> getMessage();
        }
    }
    
}
