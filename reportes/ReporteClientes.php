<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../config/DB.php';
require_once '../lib/fpdf.php';

try {
    $db = DB::conectar();
    $sql = "SELECT idcliente, nombre, email, telefono, direccion FROM cliente";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'REPORTE DE CLIENTES', 0, 1, 'C');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 10, 'ID', 1);
    $pdf->Cell(40, 10, 'Nombre', 1);
    $pdf->Cell(50, 10, 'Email', 1);
    $pdf->Cell(30, 10, 'Telefono', 1);
    $pdf->Cell(60, 10, 'Direccion', 1);
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 9);
    foreach ($clientes as $c) {
        $pdf->Cell(10, 10, $c['idcliente'], 1);
        $pdf->Cell(40, 10, $c['nombre'], 1);
        $pdf->Cell(50, 10, $c['email'], 1);
        $pdf->Cell(30, 10, $c['telefono'], 1);
        $pdf->Cell(60, 10, $c['direccion'], 1);
        $pdf->Ln();
    }

    $pdf->Output('I', 'reporte_clientes.pdf');
} catch (Exception $e) {
    echo "Error al generar el reporte: " . $e->getMessage();
}
