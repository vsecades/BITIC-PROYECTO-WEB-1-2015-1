<?php
session_start();
var_dump($_SESSION);
require_once("lib/UtilidadesSesion.php");

//revisamos sesion activa
UtilidadesSesion::revisarSesionActiva();


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

    </body>
</html>