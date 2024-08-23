<?php
session_start();
require 'model/Tienda.php';
$objtienda = new Tienda();


$cupon = $_POST['cupon_jesus_maria'];
//$idTienda = $_POST['idTienda'];

$tienda = $objtienda->updateCuponJesusMaria($cupon);
//$codigo_cupon = $tienda['cupon'];


header("Location: tienda.php");
