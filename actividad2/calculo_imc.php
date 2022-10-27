<?php
    session_start();

    global $imc;//Hace global la variable
    
    function get_nombre(){
        return "Hola $_SESSION[nombre]";
    }

    function calcula_edad(){
        $anno = date('Y');        
        $edad = intval($anno) - intval($_SESSION['anno']);
        return "Rondas los " . $edad . " años" ;
    }

    function imc(){
        $peso = doubleval($_SESSION['peso']);
        $altura = doubleval($_SESSION['altura']);
        $GLOBALS['imc'] = ($peso/(pow($altura,2)));//llama a la variable global
        
        return "Tu IMC es: " . $GLOBALS['imc'] ;
    }

    function tipo_peso(){
        $resultado = array();
        $imc = $GLOBALS['imc'];

        if($imc < 18.5){
            $resultado[0]= "Peso insuficiente… true";
            $resultado[1]= "Peso normal... false";   
            $resultado[2]= "Sobrepeso... false";    
            $resultado[3]= "Obesidad... false";            
        }
        if($imc >= 18.5 && $imc < 24.9){
            $resultado[0]= "Peso insuficiente… false";
            $resultado[1]= "Peso normal… true";   
            $resultado[2]= "Sobrepeso... false";    
            $resultado[3]= "Obesidad... false"; 
        }
        if($imc >= 25 && $imc <= 50){
            $resultado[0]= "Peso insuficiente… false";
            $resultado[1]= "Peso normal… false";   
            $resultado[2]= "Sobrepeso... true";    
            $resultado[3]= "Obesidad... false"; 
        }
        if($imc >50){
            $resultado[0]= "Peso insuficiente… false";
            $resultado[1]= "Peso normal… false";   
            $resultado[2]= "Sobrepeso... false";    
            $resultado[3]= "Obesidad... true"; 
        }

        return$resultado;

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
    IMC
    <p><?php echo get_nombre(); ?></p>
    <p><?php echo calcula_edad(); ?></p>
    <p><?php echo imc(); ?></p>
    
    <?php
        $arry_resultado = tipo_peso();
        for ($i=0; $i < count($arry_resultado) ; $i++) { 
            echo "<p>" . $arry_resultado[$i] . "</p>";
        }
    ?>
</body>
</html>