<?php
$title = "Гарри Поттер и филосовский камень";
include("src/header.php");
?>


<div class="sidebar__wrapper">
    <?php
    include("src/menu.php");
    ?>
</div>

<main class="main">
    <div class="main__wrapper">
        <div class="book__top">
            <div class="book__left">
                <div class="book__img-wrapper">
                    <img class="book__img" src="images/book-covers/garry-potter.jpg" alt="Тут должна быть картинка">
                </div>

                <div class="book__read">
                    <a href="book_reader.php">Читать</a>
                </div>

                <div class="book__add">
                    <p>Добавить к себе</p>
                </div>
                <!-- <input class="book__read" value="Читать" readonly>

                <input class="book__add" value="Добавить к себе" readonly> -->
            </div>

            <div class="book__right">
                <!-- Название книги, автор, жанры, год или дата публикации, серия (при наличии), количество просмотров и количество читающих-->
                <h1 class="book__title">
                    Гарри Поттер и филосовский камень
                </h1>

                <a class="book__author" href="#">
                    Дж.К.Роулинг
                </a>

                <p class="book__info">
                    <span>Жанры:</span> фэнтези, боевик, пришельцы
                </p>

                <p class="book__info">
                    <span>Серия:</span> Гарри Поттер (1 часть)
                </p>

                <p class="book__info">
                    <span>Год:</span> 1997
                </p>

                <p class="book__info">
                    <span>Просмотров:</span> 199
                </p>

                <p class="book__info">
                    <span>Добавлений:</span> 102
                </p>
            </div>
        </div>

        <div class="book__description">
            <h2 class="description">
                Описание
            </h2>

            <div class="description__text">
                <p>
                    Кто не слышал о храбром маленьком волшебнике Гарри Поттере и его друзьях? Это замечательная сказка, наполненная приключениями и юмором, несомненно придется по душе как маленьким читателям, так и взрослым. Ну а если вы еще не читали, то сейчас самое время начать!
                </p>
                <p>
                    Увлекательные приключения на страницах книги ждут вас!
                </p>
            </div>
        </div>

        <div class="book__content">
            <!-- Заколовок "Содержание" разворачивается и внизу номера глав и их названия (названия не обязательно), и по названиям можно перейти к конкретной главе -->
            <h2 class="content">
                Содержание
            </h2>

            <ol class="content__list">
                <li class="content__item">
                    <a href="book_reader.php/?book_id=1&chapter=1"><span>Глава 1.</span> Мальчик, который выжил</a>
                </li>
                <li class="content__item">
                    <span>Глава 2.</span> Исчезнувшее стекло
                </li>
                <li class="content__item">
                    <span>Глава 3.</span> Письма невесть от кого
                </li>
                <li class="content__item">
                    <span>Глава 4.</span> Хранитель ключей
                </li>
                <li class="content__item">
                    <span>Глава 5.</span> Косой переулок
                </li>
                <li class="content__item">
                    <span>Глава 6.</span> Путешествие с платформы девять и три четверти
                </li>
                <li class="content__item">
                    <span>Глава 7.</span> Распределяющая шляпа
                </li>
                <li class="content__item">
                    <span>Глава 8.</span> Специалист по волшебному зельеварению
                </li>
                <li class="content__item">
                    <span>Глава 9.</span> Полночная дуэль
                </li>
                <li class="content__item">
                    <span>Глава 10.</span> Хэллоуин
                </li>
                <li class="content__item">
                    <span>Глава 11.</span> Квиддич
                </li>
                <li class="content__item">
                    <span>Глава 12.</span> Зеркало Еиналеж
                </li>
                <li class="content__item">
                    <span>Глава 13.</span> Николас Фламель
                </li>
                <li class="content__item">
                    <span>Глава 14.</span> Дракон по имени Норберт
                </li>
                <li class="content__item">
                    <span>Глава 15.</span> Запретный лес
                </li>
                <li class="content__item">
                    <span>Глава 16.</span> Прыжок в люк
                </li>
                <li class="content__item">
                    <span>Глава 17.</span> Человек с двумя лицами
                </li>
            </ol>
        </div>
    </div>
</main>

<?php
include("src/footer.php");
?>