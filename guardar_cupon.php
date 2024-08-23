<?php
session_start();
require 'model/Tienda.php';
$objtienda = new Tienda();


$cupon = $_POST['cupon'];
//$idTienda = $_POST['idTienda'];

$tienda = $objtienda->updateCupon($cupon);
//$codigo_cupon = $tienda['cupon'];


header("Location: tienda.php");
