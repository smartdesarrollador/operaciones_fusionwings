<?php

session_start();
require 'model/Tienda.php';
$objtienda = new Tienda();

$fecha = $_POST['fecha_cupon_jesus_maria'];
//$idTienda = $_POST['idTienda'];

$tienda = $objtienda->updateFechaJesusMaria($fecha);
//$codigo_cupon = $tienda['cupon'];

header("Location: tienda.php");
