<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estadisticas
 *
 * @author Javi
 */

class Estadisticas {
    
    static function matricula() {
        $conexion = Conexiones::getConexion();
        $consulta = "SELECT Matricula, SUM(Tiempo) AS Suma FROM vuelos "
            ."GROUP BY Matricula";
        $resultado = $conexion -> query($consulta);
        $datos = array();
        
        while($heli = $resultado-> fetch_object()){
            $dato = array($heli -> Matricula, $heli -> Suma);
            array_push($datos, $dato);
        }
        return $datos;
    }
    
    static function modelo() {
        $conexion = Conexiones::getConexion();
        $consulta = "SELECT helicopteros.Modelo AS Modelo, SUM(vuelos.Tiempo) AS Suma "
            ."FROM helicopteros, vuelos WHERE helicopteros.Matricula = vuelos.Matricula "
            ."GROUP BY helicopteros.Modelo";
        $resultado = $conexion -> query($consulta);
        $datos = array();
        
        while($heli = $resultado -> fetch_object()){
            $dato = array($heli -> Modelo, $heli -> Suma);
            array_push($datos, $dato);
        }
        return $datos;
    }
    
    static function anno(){
        $conexion = Conexiones::getConexion();
        $consulta = "SELECT YEAR(FecVuelo) AS Anno, SUM(Tiempo) AS Suma "
            ."FROM vuelos GROUP BY Anno";
        $resultado = $conexion -> query($consulta);
        $datos = array();
        
        while($heli = $resultado -> fetch_object()){
            $dato = array($heli -> Anno, $heli -> Suma);
            array_push($datos, $dato);
        }
        return $datos;
    }
}
