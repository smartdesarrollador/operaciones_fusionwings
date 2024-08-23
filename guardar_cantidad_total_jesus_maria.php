<?php

session_start();
require 'model/Tienda.php';
$objtienda = new Tienda();

$cantidad_total = $_POST['cantidad_total_jesus_maria'];
//$idTienda = $_POST['idTienda'];

$tienda = $objtienda->updateCantidadTotalJesusMaria($cantidad_total);
//$codigo_cupon = $tienda['cupon'];

header("Location: tienda.php");
