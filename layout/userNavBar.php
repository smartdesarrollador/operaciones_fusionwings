<audio id="myAudio">
    <source src="sound/alarma-morning-mix.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
<div class="navbar-fixed bg-fusionwings">
    <nav class="animated ">
        <div class="nav-wrapper bg-fusionwings">
            <div class="">
                <a href="./" class="brand-logo deep-orange-text logoWSFPC center-align">
                    <img class="logoWSFPCImagen" src="img/fusion-wings.png" alt="">
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger white-text text-darken-2"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">


                    <li><a href="./" title="Ver los pedidos" class="<?php echo ($page == "dashboard") ? 'orange-text' : 'white-text'; ?>"><i class="material-icons left">list_alt</i> Pedidos</a>
                    </li>
                    <li><a title="Cambiar Configuraciones de la tienda" href="tienda" class="<?php echo ($page == "store") ? 'orange-text' : 'white-text'; ?>"><i class="material-icons left">store</i> Tienda</a></li>
                    <li>


                        <a href="javascript:;" data-target="dropdown3" class="<?php echo ($page == "products") ? 'orange-text' : 'white-text'; ?> dropdown-trigger">

                            <i class="material-icons left">restaurant
                            </i> Productos <i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                    <li>


                        <a href="javascript:;" data-target="dropdown5" class="<?php echo ($page == "usuarios") ? 'orange-text' : 'white-text'; ?> dropdown-trigger">

                            <i class="material-icons left">restaurant
                            </i> Usuarios <i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                    <!-- <li><a href="usuarios" class="<?php echo ($page == "usuarios") ? 'orange-text' : 'white-text'; ?>"><i class="material-icons left">supervisor_account
                            </i> Usuarios</a>
                    </li> -->

                    <li><a href="calidad" class="<?php echo ($page == "calidad") ? 'orange-text' : 'white-text'; ?>"><i class="material-icons left">security
                            </i> Calidad</a>
                    </li>

                    <li><a href="reportes" class="<?php echo ($page == "reportes") ? 'orange-text' : 'white-text'; ?>"><i class="material-icons left">insert_chart_outlined
                            </i> Reportes</a>
                    </li>

                    <li>
                        <!--<a class="btn btn-flat red white-text " style="cursor: initial"><? /*=*/ ?></a>-->

                        <?php if ($_SESSION['storeId'] == '1') { ?>
                            <a class="btn btn-flat red white-text " style="cursor: initial">Tienda 1 (Lince)</a>
                        <?php } ?>
                        <?php if ($_SESSION['storeId'] == '2') { ?>
                            <a class="btn btn-flat red white-text " style="cursor: initial">Tienda 2 (Surco)</a>
                        <?php } ?>
                        <?php if ($_SESSION['storeId'] == '3') { ?>
                            <a class="btn btn-flat red white-text " style="cursor: initial">Tienda 3 (Jesús María)</a>
                        <?php } ?>
                    </li>


                    <li><a class="dropdown-trigger capitalize" href="#!" data-target="dropdown1">Hola, <?= $_SESSION["current_fullName"] ?>

                            <i class="material-icons right">arrow_drop_down</i></a></li>


                </ul>
            </div>
        </div>

    </nav>
</div>

<ul class="sidenav " id="mobile-demo">
    <h2 class="deep-orange-text center-align"><img src="img/logoMain.png" width="40%" alt=""></h2>

    <li class="divider"></li>
    <li class="center-align">
        <p href="#" class="capitalize">
            Hola, <?= $_SESSION["current_fullName"] ?></p>
        <div class="center-align">
            <?php if ($_SESSION['storeId'] == '1') { ?>
                <a class="btn btn-flat red white-text " style="cursor: initial">Tienda 1 (Lince)</a>
            <?php } ?>
            <?php if ($_SESSION['storeId'] == '2') { ?>
                <a class="btn btn-flat red white-text " style="cursor: initial">Tienda 2 (Surco)</a>
            <?php } ?>
            <?php if ($_SESSION['storeId'] == '3') { ?>
                <a class="btn btn-flat red white-text " style="cursor: initial">Tienda 3 (Jesús María)</a>
            <?php } ?>

        </div>
    </li>


    <li class="divider"></li>

    <li class="center-align">
        <a href="./" class="<?php echo ($page == "dashboard") ? 'orange-text' : ''; ?>"><i class="material-icons left">list_alt</i>Pedidos</a>
    </li>
    <li class="divider"></li>


    <li class="center-align">
        <a href="tienda" class="<?php echo ($page == "store") ? 'orange-text' : ''; ?>"><i class="material-icons left">store</i>Tienda</a>
    </li>
    <li class="divider"></li>
    <li class="center-align">

        <a href="productos" data-target="dropdown2" class="<?php echo ($page == "products") ? 'orange-text' : ''; ?> dropdown-trigger"><i class="material-icons">restaurant
            </i>Productos</a>

    </li>


    <li class="divider"></li>
    <li class="center-align">

        <a href="usuarios" data-target="dropdown4" class="<?php echo ($page == "usuarios") ? 'orange-text' : ''; ?> dropdown-trigger"><i class="material-icons">restaurant
            </i>Usuarios</a>

    </li>
    <!--  <li class="center-align">
        <a href="usuarios" class="<?php echo ($page == "usuarios") ? 'orange-text' : ''; ?>"><i class="material-icons">supervisor_account
            </i>Usuarios</a>
    </li> -->
    <li class="divider"></li>
    <li class="center-align">
        <a href="calidad" class="<?php echo ($page == "calidad") ? 'orange-text' : ''; ?>"><i class="material-icons">security
            </i>Calidad</a>
    </li>
    <li class="divider"></li>
    <li class="center-align">
        <a href="reportes" class="<?php echo ($page == "reportes") ? 'orange-text' : ''; ?>"><i class="material-icons">insert_chart_outlined
            </i>reportes</a>
    </li>
    <li class="divider"></li>
    <!-- <?php if ($_SESSION['local_jesus_maria'] == "jesus_maria") {  ?>
        <li class="center-align"><a href="store-selector-jesus-maria"><i class="material-icons">sync_alt</i>Cambiar Local</a></li>
    <?php } else { ?>
        <li class="center-align"><a href="store-selector"><i class="material-icons">sync_alt</i>Cambiar Local</a></li>
    <?php } ?> -->

    <li class="divider"></li>
    <li class="center-align"><a href="script/logOut.php"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a></li>
    <li class="divider"></li>


</ul>


<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <!-- <?php if ($_SESSION['local_jesus_maria'] == "jesus_maria") {  ?>
        <li><a href="store-selector-jesus-maria">Cambiar Local:
                <i class="material-icons">
                    sync_alt
                </i>
            </a></li>
    <?php } else { ?>
        <li><a href="store-selector">Cambiar Local:
                <i class="material-icons">
                    sync_alt
                </i>
            </a></li>
    <?php } ?> -->



    <li><a onclick="return confirm('Estas Seguro?');" href="script/logOut.php">Cerrar Sesión <i class="material-icons">
                exit_to_app
            </i></a></li>
</ul>

<ul id="dropdown2" class="dropdown-content">
   <li>
            <a href="productos?store=1">
                Local Lince
            </a>
        </li>
</ul>
<ul id="dropdown3" class="dropdown-content">
   <li>
            <a href="productos?store=1">
                Local Lince
            </a>
        </li>

</ul>

<ul id="dropdown4" class="dropdown-content">
     <li>
            <a href="usuarios_lince.php">
                Usuarios Lince
            </a>
        </li>

</ul>

<ul id="dropdown5" class="dropdown-content">
   <li>
            <a href="usuarios_lince.php">
                Usuarios Lince
            </a>
        </li>

</ul>