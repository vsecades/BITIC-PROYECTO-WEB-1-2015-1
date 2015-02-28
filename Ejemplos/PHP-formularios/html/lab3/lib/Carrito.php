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

    /**
     * Retorna itemes de carro en el SESSION
     * @return array Itemes carro
     */
    function listadoItemesCarrito() {
        $aCarrito = $_SESSION['carrito'];
        // id, modelo, marca, precio
        $aItemesCarro = array();

        //construye itemes de carro
        foreach($aCarrito as $idModeloTelefono => $sCantidadModelo) {
            $aProducto = ConectorDatos::buscarProductoEspecifico($idModeloTelefono);
            $aProducto['cantidad'] = $sCantidadModelo;
            $aItemesCarro[] = $aProducto;
        }

        return $aItemesCarro;

    }

    function revisarCarrito() {
        if(array_key_exists('carrito',$_SESSION) === false){
            $_SESSION['carrito']=array();
        }
    }

    /**
     *
     */
    function borrarCarrito() {
        $_SESSION['carrito'] = array();
    }

    /**
     * @param $idArticulo
     * @param $cantidad
     */
    function modificarArticulo($idArticulo,$cantidad) {
        //$aTempCarrito = $_SESSION['carrito'];
        // id => cantidad
        if(array_key_exists($idArticulo,$_SESSION['carrito'])) {
            //cantidad articulo 0, elimino de carrito
            if($cantidad  == 0) {
                $this->eliminarArticuloDeCarrito($idArticulo);
            } else {
                $_SESSION['carrito'][$idArticulo] = $cantidad;
            }
        }
    }

    /**
     * Elimina artículo específico del carrito en sesión
     * @param $idArticulo Id del artículo
     */
    function eliminarArticuloDeCarrito($idArticulo) {
        if(array_key_exists($idArticulo,$_SESSION['carrito'])) {
            unset($_SESSION['carrito'][$idArticulo]);
        }
    }
}
?>