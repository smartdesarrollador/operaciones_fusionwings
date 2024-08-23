<?php

session_start();
require 'model/Tienda.php';
$objtienda = new Tienda();

$descuento = $_POST['descuento_surco'];
//$idTienda = $_POST['idTienda'];

$tienda = $objtienda->updateDescuentoSurco($descuento);
//$codigo_cupon = $tienda['cupon'];

header("Location: tienda.php");
