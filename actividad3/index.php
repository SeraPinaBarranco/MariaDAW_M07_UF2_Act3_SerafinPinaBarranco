<?php 

class Personaje{
    private $nombre;
    private $especie;
    private $experiencia;

     function __construct($nombre, $especie, $experiencia){
        $this->nombre = $nombre; 
        $this->especie = $especie;  
        $this->experiencia = $experiencia;    
     }

    function getNombre(){
        return $this->nombre;
    }
    function getEspecie(){
        return $this->especie;
    }
    function getExperiencia(){
        return $this->experiencia;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setEspecie($especie){
        $this->especie = $especie;
    }
    function setExperiencia($exp){
        $this->experiencia = $exp;
    }

}

class Guerrero extends Personaje{
    private $enemigos;

    function __construct($nombre,$especie, $experiencia,$ene){
        parent::__construct($nombre,$especie, $experiencia);

        $this->enemigos = $ene;
    }

    function getEnemigos(){
        return $this->enemigos;
    }

    public function __toString()
    {
        
        return "Soy " . $this->getNombre() . ", he abatido " . $this->getEnemigos() . " enemigos";
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
    <?php
        $p = new Guerrero("Batman", "Murcielago",1000,200);
        //echo $p->getNombre();

        echo $p;
    ?>
    
</body>
</html>