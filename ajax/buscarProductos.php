<?php
include '../model/Producto.php';
$objProducto = new Producto();
$storeId = $_POST['store'];

$listaProductos = "";
if (isset($_POST['consulta'])) {
    $q = $_POST['consulta'];
    $listaProductos = $objProducto->getProductosBySearch($q, $storeId);

} else {
    $listaProductos = $objProducto->getProductos($storeId);
}

?>
<script>

</script>
<?php foreach ($listaProductos as $producto) { ?>
    <div class="row z-depth-2 tarjetas"
    >
        <div class="col l4 m4 s12  xl4 l4">
            <p>
                <strong><u># <?php echo str_pad($producto['idProducto'], 5, "0", STR_PAD_LEFT); ?></u></strong>
            </p>

            <p>
                <strong><?php echo  $producto['nombreProducto'] ?></strong>
            </p>
            <p style="font-size: 14px">
                <em><?php echo $producto['descripcionProducto'] ?></em>
            </p>
            <p>
                <?php if($producto['store_id'] == 1){ ?>
                    <strong>S/ <?php echo number_format($producto['precioProducto'], 2, '.', ''); ?></strong>
                <?php } ?>
                <?php if($producto['store_id'] == 2){ ?>
                    <strong>S/ <?php echo number_format($producto['precioProducto'], 2, '.', ''); ?></strong>
                <?php } ?>    
                <?php if($producto['store_id'] == 3){ ?>
                    <strong>S/ <?php echo number_format($producto['precioProducto'], 2, '.', ''); ?></strong>
                <?php } ?>
            </p>
        </div>
        <div class="col l4 m4 s12  xl4 l4 ">
            <img class="  center-block lazy"
                 style="width: 180px ;margin-top: 10px;margin-bottom: 10px"
                 data-src="https://fusionwings.pe/assets/img/promos/<?php echo $producto['imagenProducto'] ?>"
                 alt="">
        </div>
        <div class="col l4 m4 s12  xl4 l4 center-align ">

            <div style="margin-top: 50px;margin-bottom: 30px">

                <strong><u>¿Stock?</u></strong>
                <div class="switch">
                    <label>
                        NO
                        <?php if ($producto['stock'] == 'YES') { ?>
                            <input data-idProducto="<?php echo $producto['idProducto']; ?>" class="chkStock" checked
                                   type="checkbox">
                        <?php } else { ?>
                            <input data-idProducto="<?php echo $producto['idProducto']; ?>" class="chkStock"
                                   type="checkbox">
                        <?php } ?>

                        <span class="lever"></span>
                        SI
                    </label>
                </div>
                <a title="Editar Producto" href="updateProduct?id=<?php echo $producto['idProducto'] ?>"
                   style="margin:15px"
                   class="btn-floating  waves-effect waves-light yellow darken-4"><i class="material-icons">edit</i></a>

            </div>

        </div>
    </div>

<?php } ?>

<script>


    lazyLoadInstance.update();


    $(".chkStock").on("click", function (e) {
        var checkbox = $(this);
        var url = "ajax/changeStockStatus.php";
        var id = $(this).attr("data-idProducto");


        if (checkbox.is(":checked")) {

            var stock = "YES";
            var datos = {id: id, stock: stock};
            $.post(url, datos, function (data) {
                console.log(data);
            }).fail(function () {
                alert("Se produjo un error, Verifica tu conexión a internet");
                location.reload();
            });
        } else {
            var stock = "NOT";
            var datos = {id: id, stock: stock};
            $.post(url, datos, function (data) {
                console.log(data);
            }).fail(function () {
                alert("Se produjo un error, Verifica tu conexión a internet");
                location.reload();
            });
        }
    });

    /*$('.chkStock').change(function() {
        console.log("cambio");
      let valor = $(this).attr("data-idProducto");


      alert(valor);

    });*/

</script>


