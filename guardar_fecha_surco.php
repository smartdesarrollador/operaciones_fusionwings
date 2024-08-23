<?php

session_start();
require 'model/Tienda.php';
$objtienda = new Tienda();

$fecha = $_POST['fecha_cupon_surco'];
//$idTienda = $_POST['idTienda'];

$tienda = $objtienda->updateFechaSurco($fecha);
//$codigo_cupon = $tienda['cupon'];

header("Location: tienda.php");
