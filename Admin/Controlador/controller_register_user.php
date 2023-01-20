<?php
if(!empty($_POST["registro"])){
    if (empty($_POST["nombre"]) or empty($_POST["correo"]) or empty($_POST["usuario"]) or empty($_POST["contrasenia"])) {
        echo '<div class="alert">One of the fields is empty</div>';
    } else {
        $nombre=$_POST["nombre"];
        $correo=$_POST["correo"];
        $usuario=$_POST["usuario"];
        $contrasenia=$_POST["contrasenia"];
        $sql=$conexion->query("INSERT INTO usuarios(nombre, correo, nom_usuario, contrasenia) VALUES ('$nombre','$correo','$usuario','$contrasenia') ");

        echo '<div class="success">Usuario registrado correctamente</div>';
        
        
    }
    
}


?>