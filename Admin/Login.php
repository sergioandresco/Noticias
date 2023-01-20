<?php

session_start();

if($_POST){
    if(($_POST['usuario']=="admin")&&($_POST['contrasenia']=="123")){

        $_SESSION['usuario']="ok";
        $_SESSION['nombreUsuario']="USER";
        header('Location:Main.php');
    }else{
        $mensaje= "Error: El usuario o contraseña son incorrectos";
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

                    <?php if(isset($mensaje)){ ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                    </div>

                    <?php } ?>

                    <form method="POST">

                    <div class = "form-group">

                    <label>User</label>

                    <input type="text" class="form-control" name="usuario" placeholder="Write your username">

                    </div>

                    <div class="form-group">

                    <label>Password</label>
                    <input type="password" class="form-control" name="contrasenia" placeholder="Enter your password">

                    </div>

                    <button type="submit" class="btn btn-primary">Log in</button>
                    <a href="Registration.php" class="btn btn-primary">Sign up</a>

                    </form>



                </div>

            </div>

            </div>

        </div>
    </div>

    </div>


  </body>
</html>
