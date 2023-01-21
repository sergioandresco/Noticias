<?php
/** 
include "DB/Connection.php";
session_start();
error_reporting(0);

define("encryption_method", "AES-128-CBC");
define("key", "sergio123");

$usuario=$_POST["usuario"];
$contrasenia=$_POST["contrasenia"];

if(isset($_POST["submit"])){

    $queryusuario = $conexion->query("SELECT * FROM usuarios WHERE nom_usuario = '$usuario'");
    $buscarpass = $queryusuario -> fetch(PDO::FETCH_NUM);

    if($queryusuario){

        $decode_pass = decrypt($buscarpass[4]);
        $nombre = $buscarpass[1];

        if ($decode_pass == $contrasenia) {
            
            session_start();

            $_SESSION['nombre'] = $nombre;
            $_SESSION['usuario']   = $usuario;

            echo "<script>window.location='Main.php'</script>";

        } else {

            echo '<div class="alert">Contraseña incorrecta</div>';
        }

        echo "<script>window.location='Main.php'</script>";

    } else {

        echo '<div class="alert">Usuario incorrecto</div>';
    }
    
}
*/
include "DB/Connection.php";
$conexion=conectar();

//define("encryption_method", "AES-128-CBC");
//define("key", "sergio123");

if(isset($_POST['submit'])){

    $usuario=$_POST["usuario"];
    $contrasenia=$_POST["contrasenia"];

    $queryregistrar = $conexion->prepare("SELECT * FROM usuarios WHERE nom_usuario = :usuario AND contrasenia = :contrasenia");
    $queryregistrar->bindParam(':usuario',$usuario, PDO::PARAM_STR);
    $queryregistrar->bindParam(':contrasenia',$contrasenia, PDO::PARAM_STR);
    $queryregistrar->execute();
    

    if($queryregistrar->rowCount()>0){


        session_start();

        $_SESSION['nombre'] = $nombre;
        $_SESSION['usuario'] = $usuario;

        echo "<script>window.location='Main.php'</script>";

    }else{
        echo "Error de registro";
    }
}

/** 
function decrypt($data) {
    $key = key;
    $c = base64_decode($data);
    $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len = 32);
    $ciphertext_raw = substr($c, $ivlen + $sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);

    if (hash_equals($hmac, $calcmac)){
        return $original_plaintext;
    }
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
        <div class="row">

        <div class="col-md-4">

        </div>

            <div class="col-md-4">

            </br></br></br>
            <div class="card">
                <div class="card-header">
                    LOGIN
                </div>
                <div class="card-body">

                    <form method="POST">

                    <div class = "form-group">

                    <label>User</label>

                    <input type="text" class="form-control" name="usuario" placeholder="Write your username">

                    </div>

                    <div class="form-group">

                    <label>Password</label>
                    <input type="password" class="form-control" name="contrasenia" placeholder="Enter your password">

                    </div>

                    <input type="submit" class="btn btn-primary" name="submit" value="Log in">
                    <a href="./Registration.php" class="btn btn-primary">Sign up</a>

                    </form>



                </div>

            </div>

            </div>

        </div>
    </div>

    </div>


  </body>
</html>
