<?php

$host="localhost";
$usuario="root";
$bd="noticenter";
$contrasenia="";

$conexion= mysqli_connect($host,$usuario,$contrasenia,$bd);

if(!$conexion){
    die("Conexión fallida");
}

?>