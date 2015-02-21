<?php
session_start();
var_dump($_SESSION);
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorDatos.php");

//revisamos sesion activa
UtilidadesSesion::revisarSesionActiva();
$aTelefonos = ConectorDatos::buscarProductos();


?>
<!DOCTYPE html>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <style>
            div { border: solid 1px grey;padding: 5px;}
        </style>
    </head>
    <body>
        <div id="header">
            Bienvenido <?php echo $_SESSION['nombreCompleto']; ?>
        </div>
        <div id="productos">
            <?php
                foreach($aTelefonos as $sMarca=>$aProductosMarca) {
                    foreach($aProductosMarca as $sModelo=>$fPrecio) {
                    ?>

                    <ul class="telefonoEspecifico">
                        <li>Marca:<?php echo $sMarca; ?></li>
                        <li>Modelo: <?php echo $sModelo; ?></li>
                        <li>Precio: <?php echo $fPrecio; ?></li>
                        <li></li>
                    </ul>
                <?php
                    }
                }
            ?>

        </div>
    </body>
</html>