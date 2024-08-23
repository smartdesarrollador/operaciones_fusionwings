<?php
session_start();
error_reporting(0);
include '../model/Ingrediente.php';
$objIngrediente = new Ingrediente();


if (isset($_SESSION["current_email"]) && $_SESSION["current_email"] != '' ) {

} else {
    http_response_code(404);
    echo "Usuario no Autorizado";
    exit();
}

if ($_SESSION['current_rol'] =='admin') {

}else{
    http_response_code(404);
    echo "Usuario no Autorizado";
    exit();
}
$id = trim($_POST['id']);
$stock = trim($_POST['stock']);

$stock = $objIngrediente->updateStockStatusIngrediente($id,$stock);
echo $stock;
