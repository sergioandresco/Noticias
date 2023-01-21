<?php

//AQUÍ REALIZAREMOS LA CARGA DE NOTICIAS A LA BD

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtCategoria=(isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";
$txtTitulo=(isset($_POST['txtTitulo']))?$_POST['txtTitulo']:"";
$txtFecha=(isset($_POST['txtFecha']))?$_POST['txtFecha']:"";
$txtTexto=(isset($_POST['txtTexto']))?$_POST['txtTexto']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include('../DB/Connection.php');
$conexion=conectar();

switch($accion){

        case "Agregar":

            $sentenciaSQL= $conexion->prepare("INSERT INTO articulos (categoria, titulo, descripcion, imagen, fecha) VALUES (:categoria, :titulo, :descripcion, :imagen, :fecha);");
            $sentenciaSQL->bindParam(':categoria',$txtCategoria);
            $sentenciaSQL->bindParam(':titulo',$txtTitulo);
            $sentenciaSQL->bindParam(':descripcion',$txtTexto);
            $sentenciaSQL->bindParam(':fecha',$txtFecha);


            $fecha= new DateTime();
            $nombreArchivo = ($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            if($tmpImagen!= ""){
                move_uploaded_file($tmpImagen,"../Images/Imagenes-Noticias/".$nombreArchivo);
            }
            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->execute();
            header("Location:News.php");
            break;

        case "Modificar":

            $sentenciaSQL= $conexion->prepare("UPDATE articulos SET titulo=:titulo WHERE id=:id");
            $sentenciaSQL->bindParam(':titulo',$txtTitulo);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();

            if($txtImagen!=""){

            $fecha= new DateTime();
            $nombreArchivo = ($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
            move_uploaded_file($tmpImagen,"../Images/Imagenes-Noticias/".$nombreArchivo);

            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM articulos WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $Post=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if(isset($Post["imagen"]) && ($Post["imagen"]!="imagen.jpg")){

                if(file_exists("../Images/Imagenes-Noticias/".$Post["imagen"])){

                    unlink("../Images/Imagenes-Noticias/".$Post["imagen"]);
                }

            }

            $sentenciaSQL= $conexion->prepare("UPDATE articulos SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();

            }
            header("Location:News.php");
            break;

        case "Cancelar":
            header("Location:News.php");
            break;

        case "Seleccionar":
            $sentenciaSQL= $conexion->prepare("SELECT * FROM articulos WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $Post=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $txtTitulo=$Post['titulo'];
            $txtImagen=$Post['imagen'];
            break;

        case "Borrar":

            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM articulos WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $Post=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if(isset($Post["imagen"]) && ($Post["imagen"]!="imagen.jpg")){

                if(file_exists("../Images/Imagenes-Noticias/".$Post["imagen"])){

                    unlink("../Images/Imagenes-Noticias/".$Post["imagen"]);
                }

            }

            $sentenciaSQL= $conexion->prepare("DELETE FROM articulos WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();

            header("Location:News.php");
            break;

}

$sentenciaSQL= $conexion->prepare("SELECT * FROM articulos");
$sentenciaSQL->execute();
$listaPost=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/Favicon/noticias.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style-Sheets/Normalize.css">
    <link rel="stylesheet" href="../Style-Sheets/Style.css"> 

    <title>Admin</title>

</head>
<body>
<?php $url= "http://".$_SERVER['HTTP_HOST']."/Noticias/Index.php" ?>

<header class="hero">
        <nav class="nav container">
            <div class="nav__logo">
                <h2 class="nav__title">NotiCenter
                    <img src="../Images/Svg/glasses.svg" class="icon__logo">

                </h2>

            </div>

            <ul class="nav__link nav__link--menu">

                <li class="nav__items">
                    <a class="nav__links" href="../Main.php">Home Administrator</a>
                </li>

                <li class="nav__items">
                    <a href="<?php echo $url; ?>" class="nav__links">Main page NotiCenter</a>
                </li>

                <li class="nav__items">
                    <a href="./Log-Out.php" class="nav__links">Log Out</a>
                </li>


                <img src="./images/close.svg" alt="" class="nav__close">
            </ul>

            <div class="nav__menu">

                <img src="./images/menu_cel.svg" alt="" class="nav__img">

            </div>

        </nav>

        <section class="hero__container container">
            <h1 class="hero__title">Then you can enter, modify or delete a piece of news from the section you want.</h1>
        </section>

    </header>

<div class="col-md-5">

    <div class="card">

        <div class="card-header">
            News data
        </div>

        <div class="card-body">

        <form method="POST" enctype="multipart/form-data">

        Select the category in which you are going to add the news<select class = "form-control" name = "txtCategoria" required><br>

            <option value = "Tecnologia">Technology</option>
            <option value = "Gamer">Gaming World</option>
            <option value = "Musica">Music</option>
            <option value = "Moda">Fashion</option>
            <option value = "Politica">Politics</option>

        </select></br>

    <div class = "form-group">
    <label for="txtID">ID: </label>
    <input type="text" required readonly  class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
    </div>

    <div class = "form-group">
    <label for="txtTitulo">Title of the news:</label>
    <input type="text" required class="form-control" value="<?php echo $txtTitulo; ?>" name="txtTitulo" id="txtTitulo" placeholder="Enter the title of the news">
    </div>

    <div class = "form-group">
    <label for="txtFecha">Drafting date:</label>
    <input type="text" required class="form-control" value="<?php echo $txtFecha; ?>" name="txtFecha" id="txtFecha" placeholder="Enter the date of writing the news">
    </div>

    <div class = "form-group">
    <label for="txtTexto">News text:</label>
    <textarea type="text" required class="form-control" value="<?php echo $txtTexto; ?>" name="txtTexto" id="txtTexto" placeholder="Enter the text of the news"></textarea>
    </div>

    <div class = "form-group">

    <label for="txtImagen">News image</label>

</br>

    <?php if($txtImagen!=""){ ?>

    <img src="../Images/Imagenes-Noticias/<?php echo $txtImagen;?>" width="50" alt="" srcset="">

    <?php } ?>

    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Ingrese el nombre del usuario">
    </div>

    <div class="btn-group" role="group" aria-label="">

    <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":"";?>value="Agregar" class="btn btn-success">Add</button>
    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?>value="Modificar" class="btn btn-warning">Change</button>
    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?>value="Cancelar" class="btn btn-info">Cancel</button>

    </div>

    </form>

        </div>

    </div>

</div>
    <div class="tabla_contenedor">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Text</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($listaPost as $post){ ?>
                    <tr>
                        <td><?php echo $post['id']; ?></td>
                        <td><?php echo $post['fecha']; ?></td>
                        <td><?php echo $post['titulo']; ?></td>
                        <td><?php echo $post['categoria']; ?></td>
                        <td><?php echo $post['descripcion']; ?></td>
                        <td>
                            <img src="../Images/Imagenes-Noticias/<?php echo $post['imagen']; ?>" width="50" alt="" srcset="">
                        </td>

                        <td>


                            <form method="post">


                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $post['id']; ?>"/>

                                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>

                                <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>



                            </form>

                        </td>

        </tr>
        <?php }?>

            </tbody>
        </table>

    </div>
   

</body>
</html>