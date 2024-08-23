<?php
session_start();
require 'model/Tienda.php';
$objtienda = new Tienda();


$cupon = $_POST['cupon_surco'];
//$idTienda = $_POST['idTienda'];

$tienda = $objtienda->updateCuponSurco($cupon);
//$codigo_cupon = $tienda['cupon'];


header("Location: tienda.php");
