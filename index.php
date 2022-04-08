<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BesLibrary</title>

    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="body__wrapper">
        <header class="header">
            <div class="header__wrapper">
                <div class="container">
                    <div class="header__inner">
                        <div class="header__logo">
                            <img class="header__logo-img" src="images/logo.svg" alt="Логотип">
                        </div>

                        <div class="header__content">
                            <div class="header__search-wrapper">
                                <form class="header__search-form" name="search_form">
                                    <input id="search" class="header__search" type="text" placeholder="Найти книгу">
                                </form>
                            </div>

                            <button class="header__notification-btn">
                                <img class="header__notification-img" src="images/icons/notification.svg"
                                    alt="Уведомления">
                            </button>

                            <button class="header__user-btn">
                                <img class="header__user-img" src="images/icons/user.svg" alt="Пользователь">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="wrapper">
            <div class="container">
                <div class="wrapper__inner">
                    <div class="sidebar__wrapper">
                        <div class="sidebar">
                            <nav class="sidebar__menu">
                                <ul class="sidebar__menu-list">
                                    <li class="sidebar__menu-item book">
                                        <a class="sidebar__menu-link" href="#">
                                            Книги
                                        </a>
                                    </li>
                                    <li class="sidebar__menu-item star">
                                        <a class="sidebar__menu-link" href="#">
                                            Интересное
                                        </a>
                                    </li>
                                    <li class="sidebar__menu-item library">
                                        <a class="sidebar__menu-link" href="#">
                                            Моя библиотека
                                        </a>
                                    </li>
                                </ul>

                                <ul class="sidebar__menu-list">
                                    <li class="sidebar__menu-item">
                                        <a class="sidebar__menu-link" href="#">
                                            Жанры
                                        </a>
                                    </li>
                                    <li class="sidebar__menu-item">
                                        <a class="sidebar__menu-link" href="#">
                                            Авторы
                                        </a>
                                    </li>
                                    <li class="sidebar__menu-item">
                                        <a class="sidebar__menu-link" href="./book_series.html">
                                            Серии
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <main class="main">
                        <section class="block">
                            <div class="block__top">
                                <h2 class="block__title">
                                    Популярное
                                </h2>
                                <a class="block__link" href="#">
                                    Показать ещё
                                </a>
                            </div>

                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="block__wrapper-img">
                                            <img class="block__img" src="images/book-covers/garri-potter-3.jpg" alt="горе от ума">
                                        </div>
                                        <h3 class="block__book-title">
                                            Гарри Поттер и Узник Азкабана
                                        </h3>
                                        <p class="block__book-author">
                                            Дж.К.Роулинг
                                        </p>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="block__wrapper-img">
                                            <img class="block__img" src="images/book-covers/garri-potter-3.jpg" alt="горе от ума">
                                        </div>
                                        <h3 class="block__book-title">
                                            Гарри Поттер и Узник Азкабана
                                        </h3>
                                        <p class="block__book-author">
                                            Дж.К.Роулинг
                                        </p>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="block__wrapper-img">
                                            <img class="block__img" src="images/book-covers/garri-potter-3.jpg" alt="горе от ума">
                                        </div>
                                        <h3 class="block__book-title">
                                            Гарри Поттер и Узник Азкабана
                                        </h3>
                                        <p class="block__book-author">
                                            Дж.К.Роулинг
                                        </p>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="block__wrapper-img">
                                            <img class="block__img" src="images/book-covers/garri-potter-3.jpg" alt="горе от ума">
                                        </div>
                                        <h3 class="block__book-title">
                                            Гарри Поттер и Узник Азкабана
                                        </h3>
                                        <p class="block__book-author">
                                            Дж.К.Роулинг
                                        </p>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="block__wrapper-img">
                                            <img class="block__img" src="images/book-covers/garri-potter-3.jpg" alt="горе от ума">
                                        </div>
                                        <h3 class="block__book-title">
                                            Гарри Поттер и Узник Азкабана
                                        </h3>
                                        <p class="block__book-author">
                                            Дж.К.Роулинг
                                        </p>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="block__wrapper-img">
                                            <img class="block__img" src="images/book-covers/garri-potter-3.jpg" alt="горе от ума">
                                        </div>
                                        <h3 class="block__book-title">
                                            Гарри Поттер и Узник Азкабана
                                        </h3>
                                        <p class="block__book-author">
                                            Дж.К.Роулинг
                                        </p>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="block__wrapper-img">
                                            <img class="block__img" src="images/book-covers/garri-potter-3.jpg" alt="горе от ума">
                                        </div>
                                        <h3 class="block__book-title">
                                            Гарри Поттер и Узник Азкабана
                                        </h3>
                                        <p class="block__book-author">
                                            Дж.К.Роулинг
                                        </p>
                                    </div>
                                </div>         
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                        </section>


                        <!-- <div class="main__slider">
                        <p class="main__slider-header">
                            Популярное
                        </p>
                    </div> -->
                    </main>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="footer__wrapper">
                <div class="container">
                    <div class="footer__inner">
                        <p class="footer__text">© BesLibrary 2022</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="script/src/main.js"></script>
    <script src="script/js_out/script.js"></script>
</body>

</html>