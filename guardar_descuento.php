<?php

session_start();
require 'model/Tienda.php';
$objtienda = new Tienda();

$descuento = $_POST['descuento'];
//$idTienda = $_POST['idTienda'];

$tienda = $objtienda->updateDescuento($descuento);
//$codigo_cupon = $tienda['cupon'];

header("Location: tienda.php");
