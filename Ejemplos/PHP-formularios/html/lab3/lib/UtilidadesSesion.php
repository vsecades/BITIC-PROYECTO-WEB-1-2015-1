<?php


class UtilidadesSesion {

    static function revisarSesionActiva() {
        if( array_key_exists('nombreCompleto',$_SESSION) === false ) {
            header('Location: formulario-sesiones.php?nosession=1');
        }
    }

    static function guardarEnSesion($sLlave, $sValor) {
        $_SESSION[$sLlave] = $sValor;
    }


}

?>