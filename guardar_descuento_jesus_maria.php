<?php

session_start();
require 'model/Tienda.php';
$objtienda = new Tienda();

$descuento = $_POST['descuento_jesus_maria'];
//$idTienda = $_POST['idTienda'];

$tienda = $objtienda->updateDescuentoJesusMaria($descuento);
//$codigo_cupon = $tienda['cupon'];

header("Location: tienda.php");
