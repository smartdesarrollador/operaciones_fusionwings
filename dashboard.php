<?php
session_start();
error_reporting(0);
$page = 'dashboard';

if (isset($_SESSION["current_email"]) && $_SESSION["current_email"] != '') {
} else {
    header('HTTP/1.1 301 Moved Permanently');
    header('location: ./');
    exit();
}

if ($_SESSION['current_rol'] == 'admin') {
} else {
    header('HTTP/1.1 301 Moved Permanently');
    header('location: ./');
    exit();
}


include 'model/Pedido.php';
include 'model/EstadoPedido.php';
include 'class/Pedido.php';

$objPedido = new Pedido();
$objEstadoPedido = new EstadoPedido();
$objPedido = new Pedido();

/* 1 - Promocion primer cliente PPC01  */
$storeId  = $_SESSION['storeId'];
/* /1 - Promocion primer cliente PPC01  */

$listaEstadosPedido = $objEstadoPedido->getEstadoPedidos();


date_default_timezone_set('America/Lima');
$actualDate = date('Ymd');

if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];
    $pedidos = $objPedido->getPedidosByDate($selectedDate);
} elseif (isset($_GET['code'])) {
    $code = $_GET['code'];
    if ($code == 'limit50') {
        $pedidos = $objPedido->getPedidosLimit50();
    }
} else {
    $pedidos = $objPedido->getPedidosByDate($actualDate);
}

$totalVentas = 0;
$numeroDepedidosEnLista = 0;

foreach ($pedidos as $pedido) {
    $numeroDepedidosEnLista++;
    $totalVentas += $pedido['precioTotal'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>.::Dashboard::.</title>
    <?php include 'layout/library.php' ?>
    <link rel="stylesheet" href="css/dashboard.css">

    <script src="js/dashboardHead.js"></script>
    <style>
        .descripcionItemsPedido {
            margin-left: 5px;
            text-transform: lowercase;

        }

        .tarjetas {
            border: 2px solid #9C0001 !important;
            border-radius: 8px;
            margin-bottom: 15px
        }
    </style>
</head>

<body>


    <?php include 'layout/userNavBar.php' ?>
    <div class="container animated fadeIn fast">
        <div class="row" style="padding: 0 0 0 0 !important;">
            <div class="col l12 xl12 s12 s12 m12 center-align">
                <img width="20px" src="img/loading.gif" alt="">
            </div>

        </div>
        <div class="row" style="padding: 0 20px 20px 20px !important;">
            <div class="col l4 push-l4 pull-l4 s12 center-align z-depth-4" style="border-radius:5px;border: 2px solid black">
                <?php
                if (isset($_GET['date'])) {
                    $selectedDate = $_GET['date'];
                    echo '<h6 style="font-weight: 900"><u>' . $selectedDate . '</u></h6>';
                } elseif (isset($_GET['code'])) {

                    echo '<h6 style="font-weight: 900"><u>Ultimos 50 pedidos</u></h6>';
                } else {
                ?>
                    <h6 id="" style="font-weight: 900"><u id="fechaActual"></u></h6>
                    <script>
                        dia()
                    </script>
                <?php
                }
                ?>

                <label><strong>FILTRAR</strong></label>
                <select class="browser-default" onchange="filtrar(this.value)">
                    <option value="" disabled selected>Elige un Opción</option>
                    <option value="1">POR FECHA</option>
                    <option value="2">ULTIMOS 50 PEDIDOS</option>
                    <option value="3">HOY</option>

                </select>
                <input type="text" id="fecha" class="datepicker">

            </div>
        </div>

    </div>
    <div class="container">
        <?php
        if (count($pedidos) > 0) {
        ?>
            <div style="display: flex;justify-content: space-around">
                <strong class=''>Total de ventas = S/. <?php echo $totalVentas ?></strong>
                <strong class=''># de pedidos en esta lista = <?php echo $numeroDepedidosEnLista ?></strong>
            </div>

            <?php
            foreach ($pedidos as $pedido) { ?>
                <div class="row z-depth-2 tarjetas">
                    <div class="col l4 m4 s12  xl4 l4">
                        <p>
                            <strong><u># <?php echo str_pad($pedido['idPedido'], 5, "0", STR_PAD_LEFT); ?></u> /
                                <span class="text-uppercase"><?php echo $pedido['documento'] ?></span></strong>
                        </p>
                        <p>
                            Hora: <strong><?php echo $pedido['horaPedido'] ?></strong>( <?php echo $pedido['fechaPedido'] ?>
                            )
                        </p>
                        <p>
                            Nombre: <strong style="text-transform: capitalize"><?php echo $pedido['nombre'] ?></strong>
                        </p>
                        <p>
                            Apellidos: <strong style="text-transform: capitalize"><?php echo $pedido['apellido'] ?></strong>
                        </p>
                        <p>
                            Direccion: <strong><?php echo $pedido['direccionPedido'] ?>
                                / <?php echo $pedido['distrito'] ?></strong>
                        </p>
                        <?php
                        if ($pedido['documento'] == 'factura') {
                        ?>
                            <p>
                                RUC: <strong><?php echo $pedido['ruc'] ?></strong>
                            </p>
                            <p>
                                Dirección fiscal: <strong><?php echo $pedido['direccionFiscal'] ?></strong>
                            </p>
                            <p>
                                Razón social: <strong><?php echo $pedido['razonSocial'] ?></strong>
                            </p>
                        <?php
                        } else {
                        ?>
                            <p>
                                DNI: <strong><?php echo $pedido['DNI'] ?></strong>
                            </p>
                        <?php
                        }
                        ?>
                        <p>
                            Fecha de Nac: <strong><?php echo $pedido['fechaNacimiento'] ?></strong>
                        </p>
                        <p>
                            Tarjeta: <strong><?php echo $pedido['brand'] ?> - <?php echo $pedido['last_four'] ?></strong>
                        </p>
                        <p>
                            Email: <strong><?php echo $pedido['email'] ?></strong>
                        </p>
                        <p>
                            Teléfono: <strong><?php echo $pedido['pedidoTelefono'] ?></strong>
                        </p>
                    </div>
                    <div class="col l4 m4 s12  xl4 l4">
                        <p><strong><u>Observaciones:</u></strong></p>
                        <p><?php echo $pedido['pedidoObservaciones'] ?></p>
                        <p><strong><u>Contenido del Pedido:</u></strong></p>
                        <ul class="collection" style="margin-bottom:  0;margin-top:0;margin-left: 5px;list-style-type: disc">
                            <?php
                            foreach ($objPedido->getPedidosItemsByidPedido($pedido['idPedido']) as $items) { ?>

                                <li class="collection-item" style="text-transform: capitalize;padding: 5px">
                                    <strong><?php

                                            echo strtolower($items['nombreProducto']) ?> (
                                        X <?php echo $items['cantidad'] ?></strong>
                                    )
                                    <ul class="descripcionItemsPedido">
                                        <li><?php echo $items['item_descripcion'] ?></li>
                                    </ul>
                                <?php
                            }
                                ?>
                                </li>
                                <li>
                                    <!--  2 - Promocion primer cliente PPC01 -->
                                    <?php

                                    $numPedidosCliente = $objPedido->numPedidosCliente($pedido['idCliente']);
                                    /* echo $numPedidosCliente;
                                    exit(); */

                                    ?>


                                    <?php if ($numPedidosCliente == 1 && $pedido['precioTotal'] > 30 && $storeId == 3) { ?>

                                        <p class="text-success m-0">1 Shawarma gratis - promoción primer pedido</p>

                                    <?php } ?>
                                    <!-- /2 - Promocion primer cliente PPC01 -->


                                </li>
                        </ul>
                        <div class="row">
                            <div class="col s12 center-align">
                                <?php if ($pedido['delivery'] == 'false') { ?>
                                    <i class="material-icons md-48">
                                        store_mall_directory
                                    </i><br>
                                    <strong>Recojo en tienda</strong>
                                <?php } else { ?>
                                    <i class="material-icons md-48">
                                        two_wheeler
                                    </i><br>
                                    <strong>Delivery</strong>
                                    <?php
                                    if (strlen($pedido['latitud']) > 4) {
                                    ?>
                                        <div style="margin-top: 10px">
                                            <a class=" btn-flat red-text" target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo $pedido['latitud']; ?>,<?php echo $pedido['longitud']; ?>"><i class="material-icons md-48">directions</i></a>
                                        </div>
                                    <?php
                                    }

                                    ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col l4 m4 s12  xl4 l4">
                        <?php if ($pedido['estado_descuento'] == 'true') { ?>
                            <p class="center-align"><strong>Monto normal: </strong><del>S/ <?php echo $pedido['precioTotal'] ?></del></p>
                            <p class="center-align"><strong>Monto con descuento: </strong> S/ <?php echo $pedido['precio_con_descuento'] ?></p>
                            <p class="center-align"><strong>Código cupón: </strong><?php echo $pedido['codigo_cupon'] ?></p>
                        <?php } else { ?>
                            <p class="center-align"><strong>TOTAL: S/ <?php echo $pedido['precioTotal'] ?></strong></p>
                        <?php } ?>

                        <p class="center-align"><small>Envío: S/ <?php echo $pedido['costoEnvioPagado'] ?></small></p>
                        <div class="row">
                            <div class="input-field col s12">
                                <select onchange="changeStatus(this.value,<?php echo $pedido['idPedido']; ?>)" class="browser-default <?php
                                                                                                                                        switch ($pedido['idEstado']) {
                                                                                                                                            case '0':
                                                                                                                                                echo "red white-text";
                                                                                                                                                break;
                                                                                                                                            case '1':
                                                                                                                                                echo "orange white-text";
                                                                                                                                                break;
                                                                                                                                            case '2':
                                                                                                                                                echo "green white-text";
                                                                                                                                                break;
                                                                                                                                            default:
                                                                                                                                                echo "black white-text";
                                                                                                                                        }

                                                                                                                                        ?>">


                                    <option value="" disabled selected>Elije una Opcion</option>


                                    <?php foreach ($listaEstadosPedido as $estado) { ?>
                                        <option <?php if ($pedido['idEstado'] == $estado['idEstado']) {
                                                    echo 'selected';
                                                } ?> value="<?php echo $estado['idEstado'] ?>">

                                            <?php echo $estado['nombreEstado']; ?></option>

                                    <?php } ?>


                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 l12 m12 xl12 center-align">
                                <a class="btn btn-small btn-flat grey black-text" target="_blank" href="utils/printReceipt.php?order=<?php echo $pedido['idPedido'] ?>">
                                    <i class="material-icons right">print</i>Imprimir</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            ?>
            <div class="row z-depth-4 hoverable animated fadeIn slow" style="border: 2px solid rgb(197, 148, 62);border-radius: 8px;margin-bottom: 10px">
                <div class="col l12 m12 s12  xl12 l12 center-align">
                    <h5>No hay pedidos para esta fecha </h5>
                    <p>Click en la fecha mostrada arriba para ver pedidos de días anteriores.</p>
                </div>
            </div>
        <?php
        }
        ?>

    </div>

    <div id="vista">

    </div>
    <script>
        function filtrar(value) {
            if (value == 1) {
                $('.datepicker').datepicker('open');
            }
            if (value == 2) {
                window.location = `dashboard?code=limit50`
            }
            if (value == 3) {
                window.location = `dashboard`

            }


        }

        var hoy = new Date();
        var dd = hoy.getDate();

        $(document).ready(function() {
            $('.datepicker').hide();

            $('.datepicker').datepicker({
                formatSubmit: 'yyyymmdd',
                onSelect: function(date) {

                    var mes = date.getMonth() + 1; //obteniendo mes
                    var dia = date.getDate(); //obteniendo dia
                    var ano = date.getFullYear(); //obteniendo año
                    if (dia < 10)
                        dia = '0' + dia; //agrega cero si el menor de 10
                    if (mes < 10)
                        mes = '0' + mes //agrega cero si el menor de 10

                    var fechaActual = ano + "-" + mes + "-" + dia;

                    console.log(fechaActual);
                    window.location = `dashboard?date=${fechaActual}`

                },
                format: 'yyyymmdd',
                i18n: {
                    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                    weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                    clear: 'Limpiar',
                    done: 'Ok',
                    cancel: 'Cancelar'
                },
                max: true
            });

        });
    </script>
    <?php include 'layout/userFooter.php' ?>


</body>

</html>