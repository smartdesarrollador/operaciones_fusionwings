<?php
session_start();
header('Content-Type: application/json');

include_once '../model/Tienda.php';
$objTienda = new Tienda();

$status = $_POST['status'];
$idTienda = $_POST['id'];

$affectedRows = $objTienda->updateDisponibilidadTienda($status, $idTienda);
if ($affectedRows <= 0) {
    http_response_code(404);
    echo json_encode(['ok' => false, 'message' => 'Invalid Params']);
    exit();
}
echo json_encode(['ok' => true, 'message' => 'Cambiado correctamente']);
