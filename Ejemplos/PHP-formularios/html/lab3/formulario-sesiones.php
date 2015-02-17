<?php
session_start();
require_once('lib/UtilidadesSesion.php');
$arrAuth=array(
    "usuario" => "cperez",
    "password" => "123",
    "nombreCompleto" => "Carlos Perez",
    "edad" => 30
);

//nombreUsuario y clave
//== === != !==
$bHayError = false;
$sMensajeError = '';
if( array_key_exists('nosession',$_GET) ) {
    $bHayError = true;
    $sMensajeError .= '<br/>Necesita autenticar al usuario';
}

//que $_POST exista


if ($_POST) {
    //nombre usuario exista
    if( $arrAuth['usuario'] === $_POST['nombreUsuario']) {
        //clave exista
        if( $arrAuth['password'] === $_POST['clave'] ) {
            UtilidadesSesion::guardarEnSesion('nombreCompleto',$arrAuth['nombreCompleto']);
            UtilidadesSesion::guardarEnSesion('edad',$arrAuth['edad']);

            header("Location:productos.php");
        } else {
            $sMensajeError .= '<br/>Usuario o clave incorrectas.';
            $bHayError = true;
        }
    } else {
        $sMensajeError .= '<br/>Usuario o clave incorrectas.';
        $bHayError = true;
    }
}



if($_POST) {
    echo 'imprimiendo POST';
    var_dump($_POST);
} elseif ($_GET) {
    echo 'imprimiendo GET';
    var_dump($_GET);
} elseif ($_REQUEST) {
    echo 'imprimiendo REQUEST';
    var_dump($_REQUEST);
}

?>
<!DOCTYPE html>
<!-- saved from url=(0057)file:///Users/vsecades/Desktop/LAB3/html5-formulario.html -->
<html><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <!-- estilos en pagina -->
    <style>


    </style>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <script type="application/javascript" src="scripts/scripts.js"></script>
</head>
<body>

<form id="loginForm" method="post" action="" >
    <div id="titulo">Login</div>
    <!-- unordered list -->
    <ul class="eliminarVineta">
        <li>
            <label for="nombreUsuario">Nombre de usuario: </label>
            <br>
            <input type="text" name="nombreUsuario" id="nombreUsuario" value="" maxlength="10">
        </li>
        <li>
            <label for="clave">Password: </label>
            <br>
            <input type="password" name="clave" id="clave">
        </li>
        <li>
            <span class="mensajeError" ><?php if($bHayError) { echo $sMensajeError; } ?></span>
            <br/>
            <input type="submit" id="enviarDatos" name="enviarDatos">
        </li>
    </ul>
</form>


</body></html>
