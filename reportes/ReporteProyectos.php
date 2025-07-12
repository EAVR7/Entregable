<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../config/DB.php';
require_once '../lib/fpdf.php';

try {
    $db = DB::conectar();
    $sql = "SELECT p.idproyecto, p.nombre, p.descripcion, c.nombre AS cliente, 
                   p.fecha_inicio, p.fecha_fin, p.estado
            FROM proyecto p 
            INNER JOIN cliente c ON p.cliente_id = c.idcliente";
    
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'REPORTE DE PROYECTOS', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 10, 'ID', 1);
    $pdf->Cell(35, 10, 'Nombre', 1);
    $pdf->Cell(40, 10, 'Descripción', 1);
    $pdf->Cell(30, 10, 'Cliente', 1);
    $pdf->Cell(25, 10, 'Inicio', 1);
    $pdf->Cell(25, 10, 'Fin', 1);
    $pdf->Cell(25, 10, 'Estado', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 9);
    foreach ($proyectos as $p) {
        $pdf->Cell(10, 10, $p['idproyecto'], 1);
        $pdf->Cell(35, 10, $p['nombre'], 1);
        $pdf->Cell(40, 10, $p['descripcion'], 1);
        $pdf->Cell(30, 10, $p['cliente'], 1);
        $pdf->Cell(25, 10, $p['fecha_inicio'], 1);
        $pdf->Cell(25, 10, $p['fecha_fin'], 1);
        $pdf->Cell(25, 10, $p['estado'], 1);
        $pdf->Ln();
    }

    $pdf->Output('I', 'reporte_proyectos.pdf');
} catch (Exception $e) {
    echo "Error al generar el reporte: " . $e->getMessage();
}
