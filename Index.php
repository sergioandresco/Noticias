<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotiCenter</title>
    <link rel="shortcut icon" href="./Images/Favicon/noticias.png" type="image/x-icon">
    <link rel="stylesheet" href="./Style-Sheets/Normalize.css">
    <link rel="stylesheet" href="./Style-Sheets/Style.css">


</head>
<body>

    <header class="hero">
        <nav class="nav container">
            <div class="nav__logo">
                <h2 class="nav__title">NotiCenter
                    <img src="./Images/Svg/glasses.svg" class="icon__logo">

                </h2>

            </div>

            <ul class="nav__link nav__link--menu">

                <li class="nav__items">
                    <a href="Index.php" class="nav__links">Main Menu</a>
                </li>

                <li class="nav__items">
                    <a class="nav__links" href="./Contents/Technology.php">Technology</a>
                </li>

                <li class="nav__items">
                    <a href="./Contents/Gaming-World.php" class="nav__links">Gaming World</a>
                </li>

                <li class="nav__items">
                    <a href="./Contents/Music.php" class="nav__links">Music</a>
                </li>

                <li class="nav__items">
                    <a href="./Contents/Fashion.php" class="nav__links">Fashion</a>
                </li>

                <li class="nav__items">
                    <a href="./Contents/Politics.php" class="nav__links">Politics</a>
                </li>

                <img src="./Images/Svg/close.svg" alt="" class="nav__close">
            </ul>

            <div class="nav__menu">

                <img src="./Images/Svg/menu_cel.svg" alt="" class="nav__img">

            </div>

        </nav>

        <section class="hero__container container">
            <h1 class="hero__title">Welcome to this your trusted newscast</h1>
            <p class="hero__paragraph">This newscast is designed to show you the most important news that happens in the world of technology, video games, music, fashion and politics.
            </p>
        </section>

    </header>
    
    <div class="horas">

        <div style="text-align:center;padding:1em 0;">

        <h2><a style="text-decoration:none; color:black;" href="https://www.zeitverschiebung.net/es/city/3688689"><span style="color:black;">Hora actual en</span><br />Bogotá, Colombia</a></h2> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=large&timezone=America%2FBogota" width="100%" height="140" frameborder="0" seamless></iframe>

        </div>
    </div>

    <main>
        <div class="container_about">
        <section class="container about">
            <h2 class="subtitle">What can you see in this newscast?</h2>
            <p class="about__paragraph">Articles, news, and relevant information related to technology, the gaming world, music, fashion trends, and additionally all the political news that exists. </p>

            <div class="about__main">
                <article class="about__icons">
                    <img src="./Images/Svg/pc.svg" class="about__icon">
                    <h3 class="about__title">Technology</h3>
                    <p class="about__paragraph">Various news about the immense world of technology.</p>
                </article>

                <article class="about__icons">
                    <img src="./Images/Svg/game.svg" class="about__icon">
                    <h3 class="about__title">Gaming World</h3>
                    <p class="about__paragraph">News about new releases and updates regarding Gaming.</p>
                </article>

                <article class="about__icons">
                    <img src="./Images/Svg/music.svg" class="about__icon">
                    <h3 class="about__title">Music</h3>
                    <p class="about__paragraph">News and releases about the world of music.</p>
                </article>

                <article class="about__icons">
                    <img src="./Images/Svg/moda.svg" class="about__icon">
                    <h3 class="about__title">Fashion</h3>
                    <p class="about__paragraph">Current trends, news, and articles about the entire world of fashion.</p>
                </article>

                <article class="about__icons">
                    <img src="./Images/Svg/world.svg" class="about__icon">
                    <h3 class="about__title">Politics</h3>
                    <p class="about__paragraph">All information about world politics, which affects all the nations of the world.</p>
                </article>

            </div>
        </section>
        </div>

        <section class="creador">
            <div class="creador__container container">
                <section class="creador__body creador__body--show" data-id="1">
                    <div class="creador__text">
                        <h2 class="subtitle">Sergio Andres Cobos Suarez<span class="creador__course">Systems Engineer - Web Developer</span></h2>
                        <p class="creador__review">I am a Colombian Systems Engineer and Web developer, I am 23 years old, and I am the creator of this great newscast, to be able to show people all the day-to-day news, on various topics and that people can enjoy it as readers .</p>
                    </div>
                    <figure class="creador__picture">
                        <img src="./Images/Logos/Sergio.JPEG" class="creador__img">
                    </figure>
                </section>
            </div>
        </section>
        <div class="container_preguntas">
        <section class="questions">
            <section class="question container">
                <h2 class="subtitle">Frequent questions</h2>
                <p class="questions__paragraph">Here are some related questions about the newscast.</p>

                <section class="questions__container">
                    <article class="questions__padding">
                        <div class="questions__answer">
                            <h3 class="questions__title">What is a newscast?
                                <span class="questions__arrow">
                                    <img src="./Images/Svg/arrow.svg" class="questions__img">
                                </span>
                            </h3>

                            <p class="questions__show">A web newscast is a website where all kinds of informative news on any kind of respective topic are published. All this works to be able to inform the audience about what happens on a day-to-day basis in the entire world.</p>
                        </div>
                    </article>

                    <article class="questions__padding">
                        <div class="questions__answer">
                            <h3 class="questions__title">How often is the newsletter updated?
                                <span class="questions__arrow">
                                    <img src="./Images/Svg/arrow.svg" class="questions__img">
                                </span>
                            </h3>

                            <p class="questions__show">The newscast is updated regularly, whenever there is new news in the world.</p>
                        </div>
                    </article>
                </section>
            </section>
        </section>
        </div>


    </main>

    <footer class="footer">
        <section class="footer__container container">
            <nav class="nav nav--footer">
                <h2 class="footer__title">NotiCenter
                    <img src="./Images/Svg/glasses.svg" class="icon__logo">
                </h2>

                <ul class="nav__link nav__link--footer">
                    <li class="nav__items">
                        <a href="Index.php" class="nav__links">Main Menu</a>
                    </li>

                    <li class="nav__items">
                        <a href="./Contents/Technology.php" class="nav__links">Technology</a>
                    </li>

                    <li class="nav__items">
                        <a href="./Contents/Gaming-World.php" class="nav__links">Gaming World</a>
                    </li>

                    <li class="nav__items">
                        <a href="./Contents/Music.php" class="nav__links">Music</a>
                    </li>

                    <li class="nav__items">
                        <a href="./Contents/Fashion.php" class="nav__links">Fashion</a>
                    </li>

                    <li class="nav__items">
                        <a href="./Contents/Politics.php" class="nav__links">Politics</a>
                    </li>
                </ul>
            </nav>

            <form class="footer__form" action="https://formspree.io/f/xqkjldnq"
            method="POST">
                <h2 class="footer__newsletter">Subscribe to the newsletter</h2>
                <div class="footer__inputs">
                    <input type="email" placeholder="e-mail:" class="footer__input" name="email">
                    <input type="submit" value="Sign up" class="footer__submit">
                </div>
            </form>
        </section>

        <section class="footer__copy container">
            <div class="footer__social">
                <a href="https://co.linkedin.com/in/sergio-andres-cobos-suarez-942637219" class="footer__icons"><img src="./Images/Svg/linkedin.svg" class="footer__img"></a>
                <a href="https://www.github.com/sergioandresco" class="footer__icons"><img src="./Images/Svg/github.svg" class="footer__img"></a>
            </div>

            <h3 class="footer__copyright">All rights reserved &copy; Sergio Andres Cobos Suarez</h3>
        </section>
    </footer>

    <script src="./Animation/Questions.js"></script>
    <script src="./Animation/Menu.js"></script>

</body>
</html>
