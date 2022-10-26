<?php 
    if(isset($_POST['nombre']) && isset($_POST['anno'])){
        
        $nombre= $_POST['nombre'];
        $anno= $_POST['anno'];

        if((strlen($nombre) > 0 or (intval($anno) < 1922 or intval($anno) > 2022))){
            session_start();
            $_SESSION['nombre'] = $nombre;
            $_SESSION['anno'] = $anno;

            

            header("Location:altura_peso.php");
        }else{
            echo "Revisa los datos";
        }
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
    <header><h1>Introduce yu nombre y tu año de nacimiento</h1></header>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="anno">Año de nacimiento</label>
        <input type="number" name="anno" id="anno" max="2022" min="1922" value="2000">
        <input type="submit" value="Enviar">

    </form>
    
</body>
</html>