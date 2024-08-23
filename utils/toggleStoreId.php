<?php
session_start();

header('Content-Type: application/json');

$storeId = $_GET['storeId'];

$url = '';

if ($storeId == '1') {
    $_SESSION['storeId'] = $storeId;
} elseif ($storeId == '2') {
    $_SESSION['storeId'] = $storeId;
} elseif ($storeId == '3') {
    $_SESSION['storeId'] = $storeId;
} else {
    http_response_code(404);
    echo json_encode(['ok' => false, 'message' => 'Invalid Params']);
    exit();
}


$role = $_SESSION['current_rol'];


if ($role == 'admin') {
    $url = 'dashboard';
} else {
    $url = 'dashboardMin';
}


echo json_encode(['ok' => true, 'message' => 'Cambiado correctamente', 'url' => $url]);
exit();

