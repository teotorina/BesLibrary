<?php
session_start();

$title = "BesLibrary";
include("src/header.php");
?>

<div class="sidebar__wrapper">
    <?php
    include("src/menu.php");
    ?>
</div>

<main class="main">
    <div class="main__wrapper">
    <div class="block__mylib">
            <h2 class="mylib__top-title">
                Моя библиотека
            </h2>
            
            <?php
                for($i = 0; $i < 3; $i++)
                {
                    ?>
                        <div class="mylib__content">
                            <div class="mylib__left">
                                <div class="mylib__img-wrapper">
                                    <img src="images/book-covers/hronici_narnii.jpg" alt="Тут должна быть картинка">
                                </div>
                            
                                <div class="mylib__read">
                                    <a href="#">Читать</a>
                                </div>
                            </div>
                            
                            <div class="mylib__right">
                                <h2 class="mylib__book-title">
                                    Хроники Нарнии
                                </h2>
                            
                                <a href="#" class="mylib__book-author">
                                    Льюис
                                </a>
                                
                                <h2 class="mylib__description">
                                    Описание:
                                </h2>
                            
                                <div class="mylib__description-text">
                                    <p>Описание этой книжки.</p>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</main>

<?php
include("src/footer.php");
?>