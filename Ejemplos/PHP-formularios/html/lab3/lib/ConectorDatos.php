<?php


class ConectorDatos {

    static function buscarProductos() {
        return array(
            'HTC' => array( '1VX' => 649.95 ),
            'Samsung' => array( 'Note2' => 699.95,
                'Galaxy S5' => 499.95,
                'Galaxy Ace' => 249.95
            ),
            'Nokia' => array( 'Lumia' => 999.95),
            'OnePlus' => array( 'One Plus One' => 299.50 )

        );
    }

    static function buscarProductoEspecifico($sNombreTelefono) {
        //TODO - EJERCICIO DE CLASE
    }
}