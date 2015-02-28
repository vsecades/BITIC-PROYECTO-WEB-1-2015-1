<?php


class ConectorBD {
    private static $host = "localhost";
    private static $port = "3306";
    private static $user = "";
    private static $password = "";
    private static $dbh;
    private static $db = "bitic_25_dev_db";


    private static function abrirConexion() {
        try{
            //modificar el string de conexion para que funcione con su base de datos
            $dbh = new PDO("mysql:host=localhost;dbname=test", self::$user, self::$password);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }

    public static function ejecutarQuery() {
        //Crear metodo
    }


}