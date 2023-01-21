<?php
include('../Admin/DB/Connection.php');
$conexion=conectar();

$sentenciaSQL= $conexion->prepare("SELECT * FROM articulos WHERE categoria = 'Tecnologia'");
$sentenciaSQL->execute();
$listaPost=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotiCenter</title>
    <link rel="shortcut icon" href="../Images/Favicon/noticias.png" type="image/x-icon">
    <link rel="stylesheet" href="../Style-Sheets/Normalize.css">
    <link rel="stylesheet" href="../Style-Sheets/Style.css">


</head>
<body>

    <header class="hero">
        <nav class="nav container">
            <div class="nav__logo">
                <h2 class="nav__title">NotiCenter
                    <img src="../Images/Svg/glasses.svg" class="icon__logo">

                </h2>

            </div>

            <ul class="nav__link nav__link--menu">

                <li class="nav__items">
                    <a href="../Index.php" class="nav__links">Main Menu</a>
                </li>

                <li class="nav__items">
                    <a href="../Contents/Gaming-World.php" class="nav__links">Gaming World</a>
                </li>

                <li class="nav__items">
                    <a href="../Contents/Music.php" class="nav__links">Music</a>
                </li>

                <li class="nav__items">
                    <a href="../Contents/Fashion.php" class="nav__links">Fashion</a>
                </li>

                <li class="nav__items">
                    <a href="../Contents/Politics.php" class="nav__links">Politics</a>
                </li>

                <img src="../Images/Svg/close.svg" alt="" class="nav__close">
            </ul>

            <div class="nav__menu">

                <img src="../Images/Svg/menu_cel.svg" alt="" class="nav__img">

            </div>

        </nav>

        <section class="hero__container container">
            <h1 class="hero__title">TECHNOLOGY</h1>
        </section>

    </header>

    <?php foreach($listaPost as $Post){?>

        <div class="Imagen-noticia">
            <img src="../Admin/Images/Imagenes-noticias/<?php echo $Post['imagen']; ?>" alt="">
        </div>

        <div class="Titulo-noticia">
            <h4><?php echo $Post['titulo']; ?></h4>
        </div>

        <div class="Fecha-noticia">
            <h4><?php echo $Post['fecha']; ?></h4>
        </div>

        <div class="Texto-noticia">
            <p><?php echo $Post['descripcion']; ?></p>
        </div>



    <?php }?>

    <script src="../Animation/Menu.js"></script>

</body>
</html>