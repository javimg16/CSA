<?php
    include 'FPDF/fpdf.php';
    
    class PDF extends FPDF{
        
        public $nombre;
        public $apellidos;
        public $funcion;
        public $fecha;


        public function __construct($nombre, $apellidos, $funcion, $fecha) {
            $this -> nombre = $nombre;
            $this -> apellidos = $apellidos;
            $this -> funcion = $funcion;
            $this -> fecha = $fecha;
            parent::__construct($orientation='P', $unit='mm', $size='A4');
        }
        
        function Header(){
            //$imagen = './Views/Images/Logo2.png';
            //$this -> Image($imagen, 10, 5, 40, 19);
            $this ->SetFont("arial", "B", 14);
            $this ->Cell(40, 5, '', 0, 0, 'C');
            $this ->Cell(100, 10, utf8_decode($this -> nombre.' '.$this -> apellidos
                .' ('. ucfirst($this -> funcion)).')', 0, 0, 'L');
            $this ->Cell(50, 10, 'Cartilla a '.date_format(date_create($this -> fecha), "d-m-Y"), 1, 0, 'R');
            $this ->Ln(20);
        }
        function Footer(){
            $this -> SetY(-15);
            $this -> SetFont('Arial', 'I', 8);
            $this -> Cell(0, 10, 'Cartilla impresa el '.date("d-m-Y",time()),0, 0, 'C');
        }
    }
?>