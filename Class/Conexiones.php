<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexiones
 *
 * @author Javi
 */
class Conexiones {
    //put your code here
    private $conexion;
    private $resultado;
            
    function __construct() {
        $this -> conexion = new mysqli("localhost", "javi", "javi", "csa");
        if ($this -> conexion -> connect_error){
            die("Error de Conexión(" . $this->conexion->connect_errno . ")"
                    . $this->conexion->connect_error);
        }
    }
    
    function desconectar() {
        $this -> conexion -> close();
    }
    
    function comprobar($usuario, $contra){
        $consulta = "SELECT Administrador FROM gestores WHERE ID = '$usuario' && "
                . "Password = '$contra'";
        $this -> resultado = $this -> conexion ->query($consulta);
        if ($this -> resultado -> num_rows != 0) {
            $tipo = $this -> resultado -> fetch_array();
            return $tipo[0];
        } else {
            return false;
        }
    }
}
?>