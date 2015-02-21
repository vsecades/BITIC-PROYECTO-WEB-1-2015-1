<?php

class Carrito {

    var $redirectUrl = 'carrito.php';

    function __construct() {
        $this->revisarCarrito();
    }

    function __destruct() {

    }

    function agregarACarrito($idProducto,$iProducto=1) {
        $aTempCarrito = $_SESSION['carrito'];

        if(array_key_exists($idProducto,$aTempCarrito)) {
            $aTempCarrito[$idProducto] += $iProducto;
        }else{
            $aTempCarrito[$idProducto] = $iProducto;
        }

        $_SESSION['carrito'] = $aTempCarrito;
        header("Location: $this->redirectUrl");
    }

    function eliminarDeCarrito() {

    }

    function revisarCarrito() {
        if(array_key_exists('carrito',$_SESSION) === false){
            $_SESSION['carrito']=array();
        }
    }
}
?>