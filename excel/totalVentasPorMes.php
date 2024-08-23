<?php
session_start();
error_reporting(0);
require_once "../vendor/autoload.php";
include '../model/Pedido.php';


$objPedido = new Pedido();
$yearAndMonth = $_REQUEST['monthAndYear'];
$sumaTotal = 0;
$tableContent = '';

$datos = $objPedido->generarExcelPrimerReporte($yearAndMonth, $_SESSION['storeId']);
foreach ($datos as $dato) {
    $sumaTotal += (int)$dato['precioTotal'];
    $tableContent .= "
     <tr>
    <td>{$dato['fechaPedido']}</td>
    <td>{$dato['precioTotal']}</td>
    <td>{$dato['last_four']}</td>
    <td>{$dato['horaPedido']}</td>
    <td>{$dato['brand']}</td>
  
  </tr>
    ";
}

$htmlString = '<table >
  <tr>
    <th>Fecha Pedido</th>
    <th>Precio Total</th>
    <th>Ultimos 4 digitos</th>
    <th>Hora</th>
    <th>Tipo Tarjeta</th>
  
  </tr>
 ' . $tableContent . '
  <tr>
    <td></td>
    <td> ' . $sumaTotal . '</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  
  </tr>
</table>';


$reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
$spreadsheet = $reader->loadFromString($htmlString);

$spreadsheet->getActiveSheet()->getStyle('A1:F1')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTGRAY)
    ->getStartColor()->setRGB('000000');

$spreadsheet->getActiveSheet()->getStyle('A1:F1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=reporte-' . $yearAndMonth . '.xlsx');
header('Cache-Control: max-age=0');


$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

$writer->save('php://output');
exit;
