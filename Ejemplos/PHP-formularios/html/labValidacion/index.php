<?php
require_once("lib/Validation.php");
if($_POST) {
    $arrErrores = array();
    var_dump($_POST);
    $valNombre = Validation::noEstaVacio("Nombre",$_POST['nombre']);
    if(is_array($valNombre)){
        $arrErrores[] = $valNombre['mensajeError'];
    }

    $valEmail = Validation::noEstaVacio("Email", $_POST['email']);
    if(is_array($valEmail)) {
        $arrErrores[] = $valEmail['mensajeError'];
    }else {
        $valEmailFormato = Validation::esEmail("Email", $_POST['email']);
        if(is_array($valEmailFormato)) {
            $arrErrores[] = $valEmailFormato['mensajeError'];
        }
    }

}

?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>Ejemplos de validacion</div>
        <form name="frmCedula" method="post" action="index.php" >
            <ul>
                <li><label>Nombre*: </label> <input type="text" name="nombre"></li>
                <li><label>Apellido1*: </label> <input type="text" name="apellido1"></li>
                <li><label>Apellido2*: </label> <input type="text" name="apellido2"></li>
                <li><label>Email*: </label> <input type="text" name="email"></li>
                <li>
                    <label>Género*: </label>
                    <select name="genero">
                        <option value="-1">Seleccionar Uno...</option>
                        <option value="mas">Masculino</option>
                        <option value="fem">Femenino</option>
                    </select>
                    <br/>
                    <br/>
                    <br/>
                </li>
                <li><label>Dirección*: </label> <textarea cols="10" rows="5"></textarea> </li>
                <li>
                    <label>Estado civil*: </label>
                    <select name="estadoCivil">
                        <option value="-1">Seleccionar Uno...</option>
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="viudo">Viudo</option>
                        <option value="unionLibre">Union Libre</option>
                    </select>
                    <br/>
                    <br/>
                    <br/>
                </li>
                <li><input type="submit" value="Enviar Datos"></li>
                <?php if($_POST) { ?>
                <li>

                    <ul class="mensajeError">
                        <?php
                            if(sizeof($arrErrores) > 0){
                                foreach($arrErrores as $strError) {
                                    echo("<li>$strError</li>");
                                }
                            }
                        ?>
                    </ul>

                </li>
                <?php } ?>
            </ul>

        </form>

    </body>
</html>