<?php

$cartilla = new Cartilla($_REQUEST['dni'], $_REQUEST['fecha']);

$pdf = new PDF($cartilla->nombre, $cartilla->apellidos, $cartilla->funcion, $cartilla->fecha);

$pdf -> AddPage();
$pdf -> Ln(20);

// POR MODELOS
$pdf ->SetFont("arial", "B", 10);
$pdf ->Cell(10, 8, 'MODELOS', 0, 0, 'L');
$pdf ->Ln(5);
$pdf ->SetFont("arial", "B", 8);
$pdf ->Rect(10, 57, 190, 30);
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->Cell(30, 5, '', 0, 0, 'C');
$pdf ->Cell(30, 5, 'HE-26', 0, 0, 'C');
$pdf ->Cell(30, 5, 'HR-12', 0, 0, 'C');
$pdf ->Cell(30, 5, 'HT-17', 0, 0, 'C');
$pdf ->Cell(30, 5, 'HU-10', 0, 0, 'C');
$pdf ->Cell(30, 5, 'TOTAL', 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->Cell(30, 5, 'MES', 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(30, 5, $cartilla -> horas['model']['mes'][0], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['mes'][1], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['mes'][2], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['mes'][3], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['mes'][4], 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->SetFont("arial", "B", 8);
$pdf ->Cell(30, 5, utf8_decode('AÑO'), 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(30, 5, $cartilla -> horas['model']['anno'][0], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['anno'][1], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['anno'][2], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['anno'][3], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['anno'][4], 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->SetFont("arial", "B", 8);
$pdf ->Cell(30, 5, 'TOTAL', 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(30, 5, $cartilla -> horas['model']['total'][0], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['total'][1], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['total'][2], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['total'][3], 0, 0, 'C');
$pdf ->Cell(30, 5, $cartilla -> horas['model']['total'][4], 0, 0, 'C');
$pdf -> Ln(25);


// POR MODALIDAD
$pdf ->SetFont("arial", "B", 10);
$pdf ->Cell(10, 8, 'MODALIDAD', 0, 0, 'L');
$pdf ->Ln(5);
$pdf ->SetFont("arial", "B", 8);
$pdf ->Rect(10, 110, 190, 30);
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->Cell(30, 5, '', 0, 0, 'C');
$pdf ->Cell(40, 5, 'Transporte de Personal', 0, 0, 'C');
$pdf ->Cell(40, 5, 'Transporte de Carga', 0, 0, 'C');
$pdf ->Cell(40, 5, 'Recorrido', 0, 0, 'C');
$pdf ->Cell(40, 5, 'TOTAL', 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->Cell(30, 5, 'MES', 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['mes'][0], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['mes'][1], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['mes'][2], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['mes'][3], 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->SetFont("arial", "B", 8);
$pdf ->Cell(30, 5, utf8_decode('AÑO'), 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['anno'][0], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['anno'][1], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['anno'][2], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['anno'][3], 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->SetFont("arial", "B", 8);
$pdf ->Cell(30, 5, 'TOTAL', 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['total'][0], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['total'][1], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['total'][2], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['modal']['total'][3], 0, 0, 'C');
$pdf -> Ln(25);

// POR ZONAS
$pdf ->SetFont("arial", "B", 10);
$pdf ->Cell(10, 8, 'ZONAS', 0, 0, 'L');
$pdf ->Ln(5);
$pdf ->SetFont("arial", "B", 8);
$pdf ->Rect(10, 163, 190, 30);
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->Cell(30, 5, '', 0, 0, 'C');
$pdf ->Cell(40, 5, 'Madrid', 0, 0, 'C');
$pdf ->Cell(40, 5, 'Barcelona', 0, 0, 'C');
$pdf ->Cell(40, 5, 'Bilbao', 0, 0, 'C');
$pdf ->Cell(40, 5, 'TOTAL', 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->Cell(30, 5, 'MES', 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['mes'][0], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['mes'][1], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['mes'][2], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['mes'][3], 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->SetFont("arial", "B", 8);
$pdf ->Cell(30, 5, utf8_decode('AÑO'), 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['anno'][0], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['anno'][1], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['anno'][2], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['anno'][3], 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->SetFont("arial", "B", 8);
$pdf ->Cell(30, 5, 'TOTAL', 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['total'][0], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['total'][1], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['total'][2], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['zonas']['total'][3], 0, 0, 'C');
$pdf -> Ln(25);

// POR TOTALES
$pdf ->SetFont("arial", "B", 10);
$pdf ->Cell(10, 8, 'TOTALES', 0, 0, 'L');
$pdf ->Ln(5);
$pdf ->SetFont("arial", "B", 8);
$pdf ->Rect(10, 216, 190, 30);
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->Cell(30, 5, '', 0, 0, 'C');
$pdf ->Cell(40, 5, 'Real', 0, 0, 'C');
$pdf ->Cell(40, 5, 'Simulador', 0, 0, 'C');
$pdf ->Cell(40, 5, 'TOTAL', 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->Cell(30, 5, 'MES', 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(40, 5, $cartilla -> horas['totales']['mes'][0], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['totales']['mes'][1], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['totales']['mes'][2], 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->SetFont("arial", "B", 8);
$pdf ->Cell(30, 5, utf8_decode('AÑO'), 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(40, 5, $cartilla -> horas['totales']['anno'][0], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['totales']['anno'][1], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['totales']['anno'][2], 0, 0, 'C');
$pdf -> Ln();
$pdf ->Cell(5, 5, '', 0, 0, 'C');
$pdf ->SetFont("arial", "B", 8);
$pdf ->Cell(30, 5, 'TOTAL', 0, 0, 'L');
$pdf ->SetFont("arial", "", 8);
$pdf ->Cell(40, 5, $cartilla -> horas['totales']['total'][0], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['totales']['total'][1], 0, 0, 'C');
$pdf ->Cell(40, 5, $cartilla -> horas['totales']['total'][2], 0, 0, 'C');
$pdf -> Ln(25);


$archivo = 'Cartillas\\' . $cartilla->nombre . ' ' . $cartilla->apellidos . ' '
        . date("M", strtotime($cartilla->fecha)) . date("y", strtotime($cartilla->fecha)) . '.pdf';
$pdf->Output('F', $archivo, false);

header('location:'.$archivo);

?>
