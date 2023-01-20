<?php

include "DB/Connection.php";
error_reporting(0);
session_start();

if(!isset($_SESSION['usuario'])){

    //header("Location: Main.php");

}

if(isset($_POST["registro"])){

    $nombre=$_POST["nombre"];
    $correo=$_POST["correo"];
    $usuario=$_POST["usuario"];
    $contrasenia=md5($_POST["contrasenia"]);
    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $result = mysqli_query($conexion, $sql);
    
    if(!$result->num_rows > 0){
        $sql = "INSERT INTO usuarios(nombre, correo, nom_usuario, contrasenia) VALUES ('$nombre','$correo','$usuario','$contrasenia')";
        $result = mysqli_query($conexion,$sql);

        if($result){
            echo '<div class="success">Usuario registrado correctamente</div>';
            $nombre="";
            $correo="";
            $usuario="";
            $_POST["contrasenia"]="";
        }else{
            echo '<div class="alert">Hay un error</div>';
        }
    }else{
        echo '<div class="alert">El correo ya existe</div>';
    }
  
}


?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./Images/Favicon/noticias.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./Style-Sheets/Style.css">
    <title>ADMIN</title>

  </head>
  <body>

  <div class="container__fondo">

    <div class="container">
        <form action="" method="POST" class="formulario">
        <div class="row">

        <div class="col-md-4">

        </div>

            <div class="col-md-4">

            </br></br></br>
            <div class="card">
                <div class="card-header">
                    REGISTRATION
                </div>
                <div class="card-body">

                    <div class = "form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Write your full name">
                    </div>

                    <div class = "form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" name="correo" placeholder="Write your e-mail">
                    </div>

                    <div class = "form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="usuario" placeholder="Write your username">
                    </div>

                    <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="contrasenia" placeholder="Enter your password">
                    </div>

                    <button type="submit" class="btn btn-primary" value="Registrar" name="registro">Sign up</button>
                    <a href="./Login.php" class="btn btn-primary">Log in</a>

                        </div>

                    </div>

                </div>

            </div>
            </form>
        </div>

    </div>


</body>
</html>