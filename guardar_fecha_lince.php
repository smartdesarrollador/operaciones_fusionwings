<?php

session_start();
require 'model/Tienda.php';
$objtienda = new Tienda();

$fecha = $_POST['fecha_cupon_lince'];
//$idTienda = $_POST['idTienda'];

$tienda = $objtienda->updateFechaLince($fecha);
//$codigo_cupon = $tienda['cupon'];

header("Location: tienda.php");
