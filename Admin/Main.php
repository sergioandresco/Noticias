<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Images/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="./Style-Sheets/normalize.css">
    <link rel="stylesheet" href="./Style-Sheets/Style.css"> 

    <title>Admin</title>

</head>
<body>

<?php $url= "http://".$_SERVER['HTTP_HOST']."/Noticias/Index.php" ?>

<header class="hero">
        <nav class="nav container">
            <div class="nav__logo">
                <h2 class="nav__title">NotiCenter
                    <img src="./Images/Svg/glasses.svg" class="icon__logo">

                </h2>

            </div>

            <ul class="nav__link nav__link--menu">

                <li class="nav__items">
                    <a href="#" class="nav__links">NotiCenter Administrator</a>
                </li>

                <li class="nav__items">
                    <a class="nav__links" href="Main.php">Main Menu</a>
                </li>

                <li class="nav__items">
                    <a href="./Sesion/News.php" class="nav__links">Upload News</a>
                </li>

                <li class="nav__items">
                    <a href="<?php echo $url; ?>" class="nav__links">Main page NotiCenter</a>
                </li>

                <li class="nav__items">
                    <a href="./Sesion/Log-Out.php" class="nav__links">Log Out</a>
                </li>


                <img src="./images/close.svg" alt="" class="nav__close">
            </ul>

            <div class="nav__menu">

                <img src="./images/menu_cel.svg" alt="" class="nav__img">

            </div>

        </nav>

        <section class="hero__container container">
            <h1 class="hero__title">Welcome to NotiCenter Administrator mode</h1>
        </section>

    </header>

</body>
</html>
