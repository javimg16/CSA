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
                
    static function getConexion() {
        $conexion = new mysqli("localhost", "javi", "javi", "csa");
        if ($conexion -> connect_error){
            die("Error de Conexión(" . $conexion -> connect_errno . ")"
                    . $conexion -> connect_error);
        }
        return $conexion;
    }
    
    static function comprobar($usuario, $contra){
        try {
            $conn = Conexiones::getConexion();
            
            $consulta = "SELECT Administrador FROM gestores WHERE ID = ? && "
                    . "Password = ?";
            $stmt = $conn ->prepare($consulta);
            $stmt ->bind_param('ss', $usuario, $contra);
            $stmt -> execute();
            $resultado = $stmt ->get_result();
            if ($resultado -> num_rows != 0) {
                $tipo = $resultado -> fetch_array();
                return $tipo[0];
            } else {
                return false;
            }
        } catch (Excepcion $e){
            echo 'Error en el metodo comprobar gestores '.$e->getMessage()."\n";
        }
    }
    
}
?>