<?php

function conectar(){

    $host="localhost";
    $bd="noticenter";
    $usuario="root";
    $contrasenia="";

    try {

        $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
        return $conexion;
    
    } catch (PDOException $error) {
    
        echo "No se pudo conectar la BD".$error->getMessage();
    }


}

 


?>