<?php
session_start();
$arrAuth=array(
    "usuario" => "cperez",
    "password" => "123",
    "nombreCompleto" => "Carlos Perez",
    "edad" => 30
);

//nombreUsuario y clave
//== === != !==

//que $_POST exista
$bHayError = false;
$errorUsuarioIncorrecto = 'Usuario o clave incorrectas.';
if ($_POST) {
    //nombre usuario exista
    if( $arrAuth['usuario'] === $_POST['nombreUsuario']) {
        //clave exista
        if( $arrAuth['password'] === $_POST['clave'] ) {
            $_SESSION['nombreCompleto'] = $arrAuth['nombreCompleto'];
            $_SESSION['edad'] = $arrAuth['edad'];
            header("Location:paginaexito.php");
        } else {
            $bHayError = true;
        }
    } else {
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
            <span class="mensajeError" ><?php if($bHayError) { echo $errorUsuarioIncorrecto; } ?></span>
            <br/>
            <input type="submit" id="enviarDatos" name="enviarDatos">
        </li>
    </ul>
</form>


</body></html>
