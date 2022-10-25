<?php
session_start();


$respuesta = "";
$numero = 0;
$num_buscado = "";
//Si la variable de sesion no está establecida la crea
if (!$_SESSION) {
    $_SESSION['aleatorio'] = numero_aleatorio();
} else {
    if (isset($_POST['numero'])) { //Comprueba si está establecido la variable numero
        $numero = $_POST['numero'];
        if (is_null($numero) or $numero <= 0 or $numero > 100) { //Comprueba el valor nulo o 0

            $respuesta = mensaje("Número incorrecto!!", "red");
        } else {
            //$respuesta = mensaje("Número correcto!!","green");
            $respuesta = comprobar($numero);
        }
    } else {
    }
}

function mensaje($msg, $color)
{
    return "<p style='color:$color'>" . $msg . "</p> ";
}


function comprobar($numero)
{
    $aleatorio = $_SESSION['aleatorio'];
    $msg = "";
    if ($numero > $aleatorio) {
        $msg = "El numero introducido es mayor al buscado";
    } else if ($numero < $aleatorio) {
        $msg = "El numero introducido es menor al buscado";
    } else {
        $msg = "El numero es el buscado";
        session_destroy();
        return mensaje($msg, "green");
    }

    return mensaje($msg, "red");
}

function numero_aleatorio()
{
    return rand(1, 100);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <head>
        <h1>Numeros aleatorios</h1>
        <h2>Introduce un número aletorio del 1 al 100 (<?php echo $_SESSION['aleatorio']; ?>)</h2>
    </head>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            Número <input type="number" name="numero" id="numero">
        </div>
        <div>
            <input type="submit" value="Comprobar">
        </div>
    </form>
    <span id="mensaje" name="mensaje"><?php echo $respuesta; ?></span>
</body>

</html>