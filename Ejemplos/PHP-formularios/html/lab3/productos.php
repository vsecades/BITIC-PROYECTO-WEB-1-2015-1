<?php
session_start();
var_dump($_SESSION);
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorDatos.php");
require_once("lib/Carrito.php");

//revisamos sesion activa
UtilidadesSesion::revisarSesionActiva();
$aTelefonos = ConectorDatos::buscarProductos();

//creamos el carrito
$oCarrito = new Carrito();
if($_POST) {
    if($_POST['accion'] === 'agregar') {
        $oCarrito->agregarACarrito($_POST['idProductoXAgregar']);
    }
}

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
                    foreach($aProductosMarca as $sIdProducto=>$aDatosProducto) {
                    ?>

                    <ul class="telefonoEspecifico">
                        <li>Marca:<?php echo $sMarca; ?></li>
                        <li>Modelo: <?php echo $aDatosProducto['modelo']; ?></li>
                        <li>Precio: <?php echo $aDatosProducto['precio']; ?></li>
                        <li>
                            <form id="agregarProducto-<?php echo $sIdProducto; ?>" action="productos.php" method="post">
                                <input name="idProductoXAgregar" type="hidden" value="<?php echo $sIdProducto; ?>">
                                <input name="accion" type="hidden" value="agregar">
                                <input type="submit" value="Agregar a Carrito">
                            </form>
                        </li>
                    </ul>
                <?php
                    }
                }
            ?>

        </div>
    </body>
</html>