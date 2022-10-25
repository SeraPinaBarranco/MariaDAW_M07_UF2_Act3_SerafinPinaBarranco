<?php 
    $numero = $_POST['numero'];

    //En este caso la variable siempre está establecida
    /*if(isset($_POST['numero'])){
        echo "ISSET";
    }else{
        echo "NO ISSET";
    }*/

    
    if(!is_null($numero)){//Comprueba el valor nulo o 0
        echo ("Sin valor " . $numero);
        
    }else{
        echo ("Con valor " . $numero);
    }


    function volver(){
        header("Refresh: 2; url=" . $_SERVER['HTTP_REFERER']);
    }
?>