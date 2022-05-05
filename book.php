<?php
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
                
                <input class="book__read" value="Читать" readonly>

                <input class="book__add" value="Добавить к себе" readonly>
            </div>
            
        </div>

        <div class="book__description">
            <h2 class="description">
                Описание:
            </h2>
            <pre class="description__text">
            Кто не слышал о храбром маленьком волшебнике Гарри Поттере и его друзьях? Это замечательная сказка, наполненная приключениями и юмором, несомненно придется по душе как маленьким читателям, так и взрослым. Ну а если вы еще не читали, то сейчас самое время начать! Увлекательные приключения на страницах книги ждут вас!
            </pre>
        </div>
    </div>
</main>

<?php
    include("src/footer.php");
?>