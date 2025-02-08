<?php
include('../../../inc/includes.php');
require_once(__DIR__ . '/../pdf/responsiva_pdf.php');

// Verificar permisos
Session::checkRight("ticket", READ);

if (isset($_GET['id'])) {
    $ticket_id = $_GET['id'];
    $ticket = new Ticket();
    $ticket->getFromDB($ticket_id);

    // Obtener datos del ticket/usuario (ejemplo)
    $data = [
        'folio' => date('YmdHis'),
        'nombre' => $ticket->fields['name'],
        'cargo' => 'Usuario de GLPI',
        'usuario_red' => 'jperez',
        'correo' => 'jperez@empresa.com',
        'area' => 'TI',
        'telefono_ext' => '1234',
        'tipo_hardware' => 'Laptop',
        'nombre_red' => 'LP-001',
        'no_serie' => 'SN123456',
        'modelo' => 'XPS 13',
        'marca' => 'Dell',
        'software_estandar' => 'Microsoft 365, Adobe Reader',
        'software_especial' => 'AutoCad LT 2025',
        'otro_software' => 'FortiClient VPN',
        'autorizo' => 'SANUEL MANCILLA',
        'vo_bo' => 'PAMELA CORREA',
        'dia' => '27',
        'mes' => '1',
        'anio' => '2025',
        'fecha_entrega' => '27/01/2025',
        'responsable_entrega' => 'SANUEL MANCILLA',
        'juridico' => 'PAMELA CORREA',
        'gerencia' => 'GERENCIA DE TI',
        'nombre_firma' => 'JUAN PÉREZ'
    ];

    // Generar PDF
    $pdf = new ResponsivaPDF();
    $pdf->generateResponsiva($data);
    $pdf->Output('carta_responsiva.pdf', 'I'); // Mostrar en navegador
}