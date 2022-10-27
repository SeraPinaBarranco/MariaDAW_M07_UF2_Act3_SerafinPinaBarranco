<?php 
    session_start();

    if(isset($_POST['altura']) && isset($_POST['peso'])){
        $altura = $_POST['altura'] ;
        $peso= $_POST['peso'];

        $patronA= "/([1-2]{1}).([0-9]{2})/";
        $patronP= "/[0-9]{2,3}/";
        if(preg_match($patronA, $altura) == 1 && preg_match($patronP, $peso) == 1){
            $_SESSION['altura'] = $altura;
            $_SESSION['peso'] = $peso;
            header("Location:calculo_imc.php");
        }else{
            echo "Altura o peso incorrecto";
        }
}

        
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header><h1>Introduce tu altura y peso</h1></header>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="altura">Altura</label>
        <input type="text" name="altura" id="altura">
        <label for="peso">Peso</label>
        <input type="text" name="peso" id="peso">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>