<?php
include("src/header.php");
?>

<div class="sidebar__wrapper">
    <?php
    include("src/menu.php");
    include("src/filters.php");
    ?>
</div>

<main class="main">
    <div class="main__wrapper">
        <div class="main__header">
            <h1 class="main__header-h1">Популярные серии книг</h1>
        </div>

        <div class="book-series-item">
            <div class="series__wrapper-img">
                <img class="book-series-item__img" src="images/book-covers/garry-potter.jpg">
            </div>

            <div class="book-series-item-content">
                <h3 class="book-series-item-content__series">Гарри Поттер</h3>
                <h4 class="book-series-item-content__author">Дж.К.Роулинг</h4>
                <p class="book-series-item-content__text">
                    <span class="book-series-item-content__genre-bold">Жанры: </span>
                    фэнтези, боевик, пришельцы
                </p>

                <ol class="book-series-item-content__books-list book-series-item-content__text">
                    <li class="book-series-item-content__book">
                        <a class="book__link" href="book.php">
                            Гарри Поттер и философский камень
                        </a> 
                    </li>
                    <li class="book-series-item-content__book">
                        Гарри Поттер и Тайная комната
                    </li>
                    <li class="book-series-item-content__book">
                        Гарри Поттер и узник Азкабана
                    </li>
                    <li class="book-series-item-content__book">
                        Гарри Поттер и Кубок Огня
                    </li>
                    <li class="book-series-item-content__book">
                        Гарри Поттер и Орден Феникса
                    </li>
                    <li class="book-series-item-content__book">
                        Гарри Поттер и Принц-полукровка
                    </li>
                    <li class="book-series-item-content__book">
                        Гарри Поттер и Дары Смерти
                    </li>
                </ol>
            </div>
        </div>

        <div class="book-series-item">
            <div class="series__wrapper-img">
                <img class="book-series-item__img" src="images/book-covers/hronici_narnii.jpg">
            </div>

            <div class="book-series-item-content">
                <h3 class="book-series-item-content__series">Хроники Нарнии</h3>
                <h4 class="book-series-item-content__author">Клайв С. Льюис</h4>
                <p class="book-series-item-content__text">
                    <span class="book-series-item-content__genre-bold">Жанры: </span>
                    фэнтези, попаданцы
                </p>

                <ol class="book-series-item-content__books-list book-series-item-content__text">
                    <li class="book-series-item-content__book">
                        Лев, Колдунья и Платяной шкаф
                    </li>
                    <li class="book-series-item-content__book">
                        Принц Каспиан
                    </li>
                    <li class="book-series-item-content__book">
                        Покоритель Зари, или Плавание на край света
                    </li>
                    <li class="book-series-item-content__book">
                        Серебряное кресло
                    </li>
                    <li class="book-series-item-content__book">
                        Конь и его мальчик
                    </li>
                    <li class="book-series-item-content__book">
                        Племянник чародея
                    </li>
                    <li class="book-series-item-content__book">
                        Последняя битва
                    </li>
                </ol>
            </div>
        </div>

        <div class="book-series-item">
            <div class="series__wrapper-img">
                <img class="book-series-item__img" src="images/book-covers/witcher.webp">
            </div>

            <div class="book-series-item-content">
                <h3 class="book-series-item-content__series">Ведьмак</h3>
                <h4 class="book-series-item-content__author">А. Сапковский</h4>
                <p class="book-series-item-content__text">
                    <span class="book-series-item-content__genre-bold">Жанры: </span>
                    фэнтези
                </p>

                <ol class="book-series-item-content__books-list book-series-item-content__text">
                    <li class="book-series-item-content__book">
                        Последнее желание
                    </li>
                    <li class="book-series-item-content__book">
                        Меч Предназначения
                    </li>
                    <li class="book-series-item-content__book">
                        Кровь эльфов
                    </li>
                    <li class="book-series-item-content__book">
                        Час Презрения
                    </li>
                    <li class="book-series-item-content__book">
                        Крещение огнём
                    </li>
                    <li class="book-series-item-content__book">
                        Башня Ласточки
                    </li>
                    <li class="book-series-item-content__book">
                        Владычица Озера
                    </li>
                    <li class="book-series-item-content__book">
                        Сезон гроз
                    </li>
                </ol>
            </div>
        </div>

    </div>
</main>

<?php
include("src/footer.php");
?>