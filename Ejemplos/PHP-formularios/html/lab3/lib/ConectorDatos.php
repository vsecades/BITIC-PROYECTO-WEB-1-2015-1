<?php


class ConectorDatos {

    /**
     * Retorna todos los productos disponibles en el carrito
     * @return array
     */
    static function buscarProductos() {
        return array(
            'HTC' => array( '1' => array('precio'=>649.95,'modelo'=>'1VX' )),
            'Samsung' => array( '2' => array('precio'=> 699.95,'modelo'=>'Note2'),
                                '3' => array('precio'=>499.95,'modelo'=>'Galaxy S5'),
                                '4' => array('precio'=>249.95,'modelo'=>'Galaxy Ace')
            ),
            'Nokia' => array( '5' => array('precio'=> 999.95, 'modelo'=>'Lumia')),
            'OnePlus' => array( '6'=> array('precio' => 299.50,'modelo'=>'One Plus One' ))

        );
    }

    /**
     * @param $idModelo
     */
    static function buscarProductoEspecifico($idModelo) {
        //TODO - EJERCICIO DE CLASE
        $aProductos = self::buscarProductos();
        $sMarca = '';

        foreach($aProductos as $sMarcaProducto => $aDatosProductos) {
            $sMarca = $sMarcaProducto;
            foreach($aDatosProductos as $sIdProucto => $aDatoProducto) {
                if($sIdProucto === $idModelo) {
                    $aDatoProducto['marca'] = $sMarca;
                    $aDatoProducto['id'] = $idModelo;
                    return $aDatoProducto;
                }
            }
        }

    }
}