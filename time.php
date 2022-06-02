<?php
session_start();
include("src/connect.php");

?>

<?php
$title = "Таймер";
include("src/header.php");
?>


<div class="sidebar__wrapper">
    <?php
    include("src/menu.php");
    ?>
</div>

<main class="main">
    <div class="main__wrapper">
        <div class="time__block">
            <h1 class="time__title">
                Скоро выйдет новая книга: Фантастические звери и места их обитания
            </h1>

            <div class="time__time">
                <p class="time_title">Осталось:</p>
                <p class="timer" id="timer"></p>
            </div>

            <a class="time__popup-button" href="#popup__book">
                Узнать подробнее
            </a>
        </div>
    </div>
</main>

<script>
    var countDownDate = new Date("Jun. 15, 2022 12:00:00").getTime();

    var countDownFunction = setInterval(function () {
        let now = new Date().getTime();
        let distance = countDownDate - now;
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
        let min = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
        let sec = Math.floor(distance % (1000 * 60) / (1000));

        document.getElementById("timer").innerHTML = days + "д " + hours + "ч " + min + "м " + sec + "с ";

        if(distance < 0) {
            clearInterval(countDownFunction);
            document.getElementById("timer").innerHTML = "Книга добавлена в библиотеку";
        }

    })
</script>

<popup class="popup" id="popup__book">
    <!-- <a href="#" class="popup__area"></a> -->
    <div class="popup__body">
        <div class="popup__content">
            <a href="#" class="popup__close">X</a>
            <div class="popup__title">Фантастические звери и места их обитания</div>
            <div class="popup__text">
                <p>Очень маленькая и короткая книжка. Для тех кто хочет продлить кайф от вселенной Гарри Поттера, это книга самое то. Получилось это такая энциклопедия по фантастическим созданиям.</p>
                
                <p>Единственный минус - отсутствие картинок. Либо мне просто не повезло и мне попалась такая электронная книга, что в ней не было картинок. Зато есть описание. Что за животное, что есть, где живёт.</p>
                
                <p>Итог : Атмосферно. Читается легко и быстро. Рекомендую</p>

                <p>Книга выйдет 15 июня 2022 года</p>
            </div>
        </div>
    </div>
</popup>

<?php
include("src/footer.php");
?>