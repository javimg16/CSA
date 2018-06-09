<?php

include 'Models\Conexiones.php';

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
            echo 'createAdmin prueba 1';
            $consulta = "INSERT INTO gestores (ID, Password, Administrador, Correo) "
                    . "VALUES (?, ?, ?, ?)";
            echo 'createAdmin prueba 2';
            $stmt = $conexion -> prepare($consulta);
            echo 'createAdmin prueba 3';
            $stmt -> bind_param('ssss', $this -> getId(), $this -> getPassword(), 
                    $this -> getAdministrador(), $this -> getCorreo());
            echo 'createAdmin prueba 4';
            $stmt -> execute();
            echo 'createAdmin prueba 5';
        } catch (Exception $e) {
            echo "Error al insertar datos en tabla gestores".$e -> getMessage();
        }
    }
    
}
