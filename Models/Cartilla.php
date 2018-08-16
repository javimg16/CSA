<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cartilla
 *
 * @author Javi
 */
class Cartilla extends Personal {
    public $fecha;
    public $horas = ["model" => ["mes" => [0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0],
            "anno" => [0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0],
            "total" => [0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0]
        ], "modal" => ["mes" => [0 => 0, 1 => 0, 2 => 0, 3 => 0],
            "anno" => [0 => 0, 1 => 0, 2 => 0, 3 => 0],
            "total" => [0 => 0, 1 => 0, 2 => 0, 3 => 0]
        ], "zonas" => ["mes" => [0 => 0, 1 => 0, 2 => 0, 3 => 0],
            "anno" => [0 => 0, 1 => 0, 2 => 0, 3 => 0],
            "total" => [0 => 0, 1 => 0, 2 => 0, 3 => 0],
        ],"totales" => ["mes" => [0 => 0, 1 => 0, 2 => 0],
            "anno" => [0 => 0, 1 => 0, 2 => 0],
            "total" => [0 => 0, 1 => 0, 2 => 0]]];
    function __construct($dni, $fecha) {
        parent::__construct($dni);
        $this -> fecha = $fecha;
        $this -> datosPersonales();
        $this -> datModelMes();
        $this -> datModelAnno();
        $this -> datModelTot();
        $this -> datModalMes();
        $this -> datModalAnno();
        $this -> datModalTot();
        $this -> datZonMes();
        $this -> datZonAnno();
        $this -> datZonTot();
        $this -> datTotMes();
        $this -> datTotAnno();
        $this -> datTotTot();
    }
    // CONSULTA DE HORAS POR MODELO
    // Por Mes
    function datModelMes(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, helicopteros.Modelo "
                ."FROM vuelos, helicopteros, vuelos_personal "
                ."WHERE vuelos.Matricula = helicopteros.Matricula "
                    ."AND vuelos_personal.NumRegistro = vuelos.NumRegistro "
                    ."AND vuelos_personal.DNI = ? "
                    ."AND vuelos.FecVuelo BETWEEN (? - INTERVAL(DAY(?)-1)DAY) AND ? "
                ."GROUP BY helicopteros.Modelo, vuelos_personal.DNI";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecha = $this -> fecha;
            $stmt -> bind_param('ssss', $dni, $fecha, $fecha, $fecha);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            while ($fila = $resultado ->fetch_object()){
                $this -> annadirHoras($fila, "Modelos", "mes");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Por Año
    function datModelAnno(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, helicopteros.Modelo "
                ."FROM vuelos, helicopteros, vuelos_personal WHERE vuelos.Matricula = helicopteros.Matricula "
                ."AND vuelos_personal.NumRegistro = vuelos.NumRegistro AND vuelos_personal.DNI = ? "
                ."AND vuelos.FecVuelo BETWEEN date_format(?, 'Y-01-01') AND ? "
                ."GROUP BY helicopteros.Modelo, vuelos_personal.DNI";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecha = $this -> fecha;
            $stmt -> bind_param('sss', $dni, $fecha, $fecha);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            while ($fila = $resultado ->fetch_object()){
                $this -> annadirHoras($fila, "Modelos", "anno");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Totales
    function datModelTot(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, helicopteros.Modelo "
                ."FROM vuelos, helicopteros, vuelos_personal "
                ."WHERE vuelos.Matricula = helicopteros.Matricula "
                    ."AND vuelos_personal.NumRegistro = vuelos.NumRegistro "
                    ."AND vuelos_personal.DNI = ? "
                    ."AND vuelos.FecVuelo BETWEEN ? AND ? "
                ."GROUP BY helicopteros.Modelo, vuelos_personal.DNI";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecAlta = $this -> fecAlta;
            $fecha = $this -> fecha;
            $stmt -> bind_param('sss', $dni, $fecAlta, $fecha);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            while ($fila = $resultado -> fetch_object()){
                $this -> annadirHoras($fila, "Modelos", "total");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // CONSULTA DE HORAS POR MODALIDAD
    // Por Mes
    function datModalMes(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, vuelos.Modalidad  "
                ."FROM vuelos, vuelos_personal "
                ."WHERE vuelos_personal.NumRegistro = vuelos.NumRegistro "
                    ."AND vuelos_personal.DNI = ? "
                    ."AND vuelos.FecVuelo BETWEEN (? - INTERVAL(DAY(?)-1)DAY) AND ? "
                ."GROUP BY vuelos.Modalidad";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecha = $this -> fecha;
            $stmt -> bind_param('ssss', $dni, $fecha, $fecha, $fecha);
            $stmt -> execute();
            $resultados = $stmt -> get_result();
            while ($fila = $resultados -> fetch_object()){
                $this -> annadirHoras($fila, "Modalidad", "mes");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Por Año
    function datModalAnno(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, vuelos.Modalidad  "
                ."FROM vuelos, vuelos_personal "
                ."WHERE vuelos_personal.NumRegistro = vuelos.NumRegistro "
                    ."AND vuelos_personal.DNI = ? "
                    ."AND vuelos.FecVuelo BETWEEN date_format(?, 'Y-01-01') AND ? "
                ."GROUP BY vuelos.Modalidad";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecha = $this ->  fecha;
            $stmt -> bind_param('sss', $dni, $fecha, $fecha );
            $stmt -> execute();
            $resultados = $stmt -> get_result();
            while ($fila = $resultados -> fetch_object()){
                $this -> annadirHoras($fila, "Modalidad", "anno");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    // Totales
    function datModalTot(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, vuelos.Modalidad  "
                ."FROM vuelos, vuelos_personal "
                ."WHERE vuelos_personal.NumRegistro = vuelos.NumRegistro "
                    ."AND vuelos_personal.DNI = ? "
                    ."AND vuelos.FecVuelo BETWEEN ? AND ? "
                ."GROUP BY vuelos.Modalidad";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecAlta = $this -> fecAlta;
            $fecha = $this -> fecha;
            $stmt -> bind_param('sss', $dni, $fecAlta, $fecha);
            $stmt -> execute();
            $resultados = $stmt -> get_result();
            while ($fila = $resultados -> fetch_object()){
                $this -> annadirHoras($fila, "Modalidad", "total");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // CONSULTA DE HORAS POR ZONAS
    // Por Mes
    function datZonMes(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, vuelos.Zona  "
                ."FROM vuelos, vuelos_personal "
                ."WHERE vuelos_personal.NumRegistro = vuelos.NumRegistro "
                    ."AND vuelos_personal.DNI = ? "
                    ."AND vuelos.FecVuelo BETWEEN (? - INTERVAL(DAY(?)-1)DAY) AND ? "
                ."GROUP BY vuelos.Zona";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecha = $this -> fecha;
            $stmt -> bind_param('ssss', $dni, $fecha, $fecha, $fecha);
            $stmt -> execute();
            $resultados = $stmt -> get_result();
            while ($fila = $resultados -> fetch_object()){
                $this -> annadirHoras($fila, "Zonas", "mes");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Por Año
    function datZonAnno(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, vuelos.Zona  "
                ."FROM vuelos, vuelos_personal "
                ."WHERE vuelos_personal.NumRegistro = vuelos.NumRegistro "
                    ."AND vuelos_personal.DNI = ? "
                    ."AND vuelos.FecVuelo BETWEEN date_format(?, 'Y-01-01') AND ? "
                ."GROUP BY vuelos.Zona";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecha = $this -> fecha;
            $stmt -> bind_param('sss', $dni, $fecha, $fecha);
            $stmt -> execute();
            $resultados = $stmt -> get_result();
            while ($fila = $resultados -> fetch_object()){
                $this -> annadirHoras($fila, "Zonas", "anno");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    // Totales
    function datZonTot(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, vuelos.Zona  "
                ."FROM vuelos, vuelos_personal "
                ."WHERE vuelos_personal.NumRegistro = vuelos.NumRegistro "
                    ."AND vuelos_personal.DNI = ? "
                    ."AND vuelos.FecVuelo BETWEEN ? AND ? "
                ."GROUP BY vuelos.Zona";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecAlta = $this -> fecAlta;
            $fecha = $this -> fecha;
            $stmt -> bind_param('sss', $dni, $fecAlta, $fecha);
            $stmt -> execute();
            $resultados = $stmt -> get_result();
            while ($fila = $resultados -> fetch_object()){
                $this -> annadirHoras($fila, "Zonas", "total");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // CONSULTA DE HORAS TOTALES
    // Por Mes
    function datTotMes(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, helicopteros.Simulador "
                ."FROM vuelos, helicopteros, vuelos_personal "
                ."WHERE vuelos.Matricula = helicopteros.Matricula "
                    ."AND vuelos_personal.NumRegistro = vuelos.NumRegistro "
                    ."AND vuelos_personal.DNI = ? "
                    ."AND vuelos.FecVuelo BETWEEN (? - INTERVAL(DAY(?)-1)DAY) AND ? "
                ."GROUP BY helicopteros.Simulador, vuelos_personal.DNI";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecha = $this -> fecha;
            $stmt -> bind_param('ssss', $dni, $fecha, $fecha, $fecha);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            while ($fila = $resultado ->fetch_object()){
                $this -> annadirHoras($fila, "TOTALES", "mes");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Por Año
    function datTotAnno(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, helicopteros.Simulador "
                ."FROM vuelos, helicopteros, vuelos_personal WHERE vuelos.Matricula = helicopteros.Matricula "
                ."AND vuelos_personal.NumRegistro = vuelos.NumRegistro AND vuelos_personal.DNI = ? "
                ."AND vuelos.FecVuelo BETWEEN date_format(?, 'Y-01-01') AND ? "
                ."GROUP BY helicopteros.Simulador, vuelos_personal.DNI";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecha = $this -> fecha;
            $stmt -> bind_param('sss', $dni, $fecha, $fecha);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            while ($fila = $resultado ->fetch_object()){
                $this -> annadirHoras($fila, "TOTALES", "anno");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Totales
    function datTotTot(){
        try {
            $conexion = Conexiones::getConexion();
            $consulta = "SELECT SUM(vuelos.Tiempo) AS Suma, helicopteros.Simulador "
                ."FROM vuelos, helicopteros, vuelos_personal "
                ."WHERE vuelos.Matricula = helicopteros.Matricula "
                    ."AND vuelos_personal.NumRegistro = vuelos.NumRegistro "
                    ."AND vuelos_personal.DNI = ? "
                    ."AND vuelos.FecVuelo BETWEEN ? AND ? "
                ."GROUP BY helicopteros.Simulador, vuelos_personal.DNI";
            $stmt = $conexion -> prepare($consulta);
            $dni = $this -> getDni();
            $fecAlta = $this -> fecAlta;
            $fecha = $this -> fecha;
            $stmt -> bind_param('sss', $dni, $fecAlta, $fecha);
            $stmt -> execute();
            $resultado = $stmt -> get_result();
            while ($fila = $resultado -> fetch_object()){
                $this -> annadirHoras($fila, "TOTALES", "total");
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    // Función que recoge la consultas y los va guardando donde corresponde
    function annadirHoras($datos, $grupo, $fila){
        if($grupo == "Modelos"){
            if($datos -> Modelo == 'HE-26'){
                $this -> horas["model"][$fila][0] = $datos -> Suma;
                $this -> horas["model"][$fila][4] += $datos -> Suma;
            } elseif($datos -> Modelo == 'HR-12'){
                $this -> horas["model"][$fila][1] = $datos -> Suma;
                $this -> horas["model"][$fila][4] += $datos -> Suma;
            } elseif($datos -> Modelo == 'HT-17'){
                $this -> horas["model"][$fila][2] = $datos -> Suma;
                $this -> horas["model"][$fila][4] += $datos -> Suma;
            } elseif($datos -> Modelo == 'HU-10'){
                $this -> horas["model"][$fila][3] = $datos -> Suma;
                $this -> horas["model"][$fila][4] += $datos -> Suma;
            }
        } elseif($grupo == "Modalidad"){
            if($datos -> Modalidad == 'transportepersonal'){
                $this -> horas["modal"][$fila][0] = $datos -> Suma;
                $this -> horas["modal"][$fila][3] += $datos -> Suma;
            } elseif($datos -> Modalidad == 'transportecarga'){
                $this -> horas["modal"][$fila][1] = $datos -> Suma;
                $this -> horas["modal"][$fila][3] += $datos -> Suma;
            } elseif($datos -> Modalidad == 'recorrido'){
                $this -> horas["modal"][$fila][2] = $datos -> Suma;
                $this -> horas["modal"][$fila][3] += $datos -> Suma;
            }
        } elseif($grupo == "Zonas"){
            if($datos -> Zona == 'madrid'){
                $this -> horas["zonas"][$fila][0] = $datos -> Suma;
                $this -> horas["zonas"][$fila][3] += $datos -> Suma;
            } elseif($datos -> Zona == 'barcelona'){
                $this -> horas["zonas"][$fila][1] = $datos -> Suma;
                $this -> horas["zonas"][$fila][3] += $datos -> Suma;
            } elseif($datos -> Zona == 'bilbao'){
                $this -> horas["zonas"][$fila][2] = $datos -> Suma;
                $this -> horas["zonas"][$fila][3] += $datos -> Suma;
            }
        } elseif($grupo == "TOTALES"){
            if($datos -> Simulador == '1'){
                $this -> horas["totales"][$fila][1] = $datos -> Suma;
                $this -> horas["totales"][$fila][2] += $datos -> Suma;
            } elseif($datos -> Simulador == '2'){
                $this -> horas["totales"][$fila][0] = $datos -> Suma;
                $this -> horas["totales"][$fila][2] += $datos -> Suma;
            }
        }
    }
}
