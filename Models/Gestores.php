<?php

class Gestores {
    
    static function create($id, $contra, $tipo, $correo){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "INSERT INTO gestores (ID, Password, Administrador, Correo) "
                    . "VALUES (?,?,?,?)";
            $stmt = $conexion -> prepare($consulta);
            $stmt -> bind_param('ssis', $id, $contra, $tipo, $correo);
            if($stmt -> execute())
                return true;
             else
                return false;
        } catch (Exception $e) {
            echo "Error al insertar datos en tabla gestores".$e -> getMessage();
        }
    }
    
    static function retrive($id, $tipo){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT ID, Password, Administrador, Correo "
                    . "FROM gestores WHERE ID LIKE ? AND Administrador LIKE ?";
            $stmt = $conexion -> prepare($consulta);
            $stmt -> bind_param('si', $id, $tipo);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            $envio = $resultado -> fetch_array();
            return $envio;
        } catch (Exception $e) {
            echo $e;
        }
    }
    
    static function update($id, $administrador, $contra, $tipo, $correo){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "UPDATE gestores SET ID = ?, Password = ?, Administrador = ?, "
                    . "Correo = ? WHERE ID = ?";
            $stmt = $conexion -> prepare($consulta);
            $stmt -> bind_param('ssiss', $administrador, $contra, $tipo, $correo, $id);
            if($stmt -> execute()){
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e;
        }
    }
    
    static function delete($id){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "DELETE FROM gestores WHERE ID LIKE ?";
            $stmt = $conexion -> prepare($consulta);
            $stmt ->bind_param('s', $id);
            if($stmt -> execute()){
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e;
        }
    }
    
}
