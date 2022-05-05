<?php
include("src/header.php");
?>

<div class="sidebar__wrapper">
    <?php
    include("src/menu.php");
    ?>
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
            <?php
                $file = fopen("index_content.txt", "r");
                while(!feof($file))
                {

                ?>
                <div class="swiper-slide">
                    <div class="block__wrapper-img">
                        <img class="block__img" src="<?php echo fgets($file); ?>" alt="горе от ума">
                    </div>
                    <h3 class="block__book-title">
                        <?php echo fgets($file); ?>
                    </h3>
                    <p class="block__book-author">
                        <?php echo fgets($file); ?>
                    </p>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </section>

    <section class="block">
        <div class="block__top">
            <h2 class="block__title">
                Новинки
            </h2>
            <a class="block__link" href="#">
                Показать ещё
            </a>
        </div>


        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="block__wrapper-img">
                        <img class="block__img" src="images/book-covers/garry-potter-3.jpg" alt="горе от ума">
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
                        <img class="block__img" src="images/book-covers/garry-potter-3.jpg" alt="горе от ума">
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
                        <img class="block__img" src="images/book-covers/garry-potter-3.jpg" alt="горе от ума">
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
                        <img class="block__img" src="images/book-covers/garry-potter-3.jpg" alt="горе от ума">
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
                        <img class="block__img" src="images/book-covers/garry-potter-3.jpg" alt="горе от ума">
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
                        <img class="block__img" src="images/book-covers/garry-potter-3.jpg" alt="горе от ума">
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
                        <img class="block__img" src="images/book-covers/garry-potter-3.jpg" alt="горе от ума">
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

</main>

<?php
include("src/footer.php");
?>