<?php
/**
 * Created by PhpStorm.
 * User: estudiante
 * Date: 23/03/15
 * Time: 06:41 PM
 */

class Validation {

    static $validationErrors;
    /* no lo necesitamos
    function __construct() {

    }
    */

    /**
     * Revisar si el $contenido viene vacío
     * @param $contenido El contenido a validar
     */
    static function noEstaVacio($nombreCampo,$contenido) {
        $contenido = str_replace(" ","",$contenido);
        if(!$contenido || strlen($contenido) === 0){

            return array('resultado'=>false,
                'mensajeError' => "El campo $nombreCampo está vacío",
                'campoDelError' => $nombreCampo
            );

        }
        return true;
    }

    static function esAlfanumerico() {

    }

    static function tieneXLongitud() {

    }

    static function esNumerico() {

    }

    /**
     * Validando si el email es válido
     * @param $nombreCampo Nombre del campo en el formulario para display
     * @param $contenido  Contenido que ingresamos en el input del formulario
     */
    static function esEmail($nombreCampo,$contenido) {
        $bEsEmail = filter_var($contenido,FILTER_VALIDATE_EMAIL);
        echo 'valor de $bEsEmail ';
        var_dump($bEsEmail);
        if($bEsEmail === false){
            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo es inválido.",
                'campoDelError' => $nombreCampo
            );

        }
        return true;
    }

    static function esSoloAlfa() {

    }

}