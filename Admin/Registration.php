<?php
/** 
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
*/
/** 
include "DB/Connection.php";
error_reporting(0);

define("encryption_method", "AES-128-CBC");
define("key", "sergio123");

$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$usuario=$_POST["usuario"];
$contrasenia=$_POST["contrasenia"];
$pass_fuerte = encrypt($contrasenia);

if(isset($_POST['registro'])){

    $queryregistrar = $conexion->prepare("INSERT INTO usuarios(nombre, correo, nom_usuario, contrasenia) VALUES (:nombre, :correo, :usuario, :contrasenia)");

    
    $queryregistrar->bindParam(':nombre',$nombre, PDO::PARAM_STR);
    $queryregistrar->bindParam(':correo',$correo, PDO::PARAM_STR);
    $queryregistrar->bindParam(':usuario',$usuario, PDO::PARAM_STR);
    $queryregistrar->bindParam(':pass_fuerte',$pass_fuerte, PDO::PARAM_STR);

    $ejecutar = $queryregistrar->execute();
    
    if($ejecutar){
        
        echo "<script>window.location='Main.php'</script>";
    }
    
    
    $pass_fuerte = encrypt($contrasenia);
    $queryregistrar = $conexion->prepare("INSERT INTO usuarios(nombre, correo, nom_usuario, contrasenia) VALUES ('$nombre','$correo','$usuario','$pass_fuerte')");
    
    if(mysqli_query($conexion,$queryregistrar)){

        session_start();

        $_SESSION['nombre'] = $nombre;
        $_SESSION['usuario']   = $usuario;

        echo "<script>window.location='Main.php'</script>";

    }else{
        echo "Error";
    }
}

}
*/
include "DB/Connection.php";
$conexion=conectar();
//define("encryption_method", "AES-128-CBC");
//define("key", "sergio123");

if(isset($_POST['registro'])){

    $nombre=$_POST["nombre"];
    $correo=$_POST["correo"];
    $usuario=$_POST["usuario"];
    $contrasenia=$_POST["contrasenia"];

    $existente=$conexion->query("SELECT * FROM usuarios WHERE nombre = '$nombre' or correo='$correo'");

    if($existente->rowCount()>0){

        echo "Nombre de usuario o correo ya existe.";

    }else{

        try{

            $queryregistrar = $conexion->prepare("INSERT INTO usuarios(nombre, correo, nom_usuario, contrasenia) VALUES (:nombre, :correo, :usuario, :contrasenia)");
            $queryregistrar->bindParam(':nombre',$nombre, PDO::PARAM_STR);
            $queryregistrar->bindParam(':correo',$correo, PDO::PARAM_STR);
            $queryregistrar->bindParam(':usuario',$usuario, PDO::PARAM_STR);
            $queryregistrar->bindParam(':contrasenia',$contrasenia, PDO::PARAM_STR);

            $ejecutar = $queryregistrar->execute();

            session_start();

            $_SESSION['nombre'] = $nombre;
            $_SESSION['usuario']   = $usuario;

            echo "<script>window.location='Main.php'</script>";
        }

        catch (PDOException $error){

            print "ERROR:".$error->getMessage();
            echo "ERROR DE REGISTRO";
        }

    }
}
/** 
function encrypt($data) {

    $key = key;
    $plaintext = $data;
    $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = base64_encode(openssl_encrypt($plaintext, $cipher, $key, 0, $iv)./base64_encode($iv));
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
    return $ciphertext;
}
*/

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
                    <input type="password" class="form-control" name="contrasenia" placeholder="Enter your password" required>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Sign up" name="registro">
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