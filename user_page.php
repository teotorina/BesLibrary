<?php
    session_start();

    $title = "Страница пользователя";
    include("src/header.php");
?>

<div class="sidebar__wrapper">
    <?php
    include("src/menu.php");
    ?>
</div>

<main class="main">
    <div class="main__wrapper">
        <div class="block__nick">
            <h2 class="nick">
                <?php

                    // unset($_SESSION['user_id']);

                    include("src/connect.php");
                    
                    $nick_request = "SELECT nick FROM user WHERE id = '{$_SESSION['user_id']}';";

                    $nick_result = mysqli_query($connection, $nick_request);

                    if($nick_result->num_rows == 0)
                    {
                        echo "Ошибка";
                    }
                
                    $nick_array = $nick_result->fetch_row();

                    echo $nick_array[0];
                ?>
            </h2>

        </div>

        <div class="block__mylib">
            <h2 class="mylib__top-title">
                Моя библиотека
            </h2>
            
            <div class="mylib__wrapper">
                <?php
                for($i = 0; $i < 3; $i++)
                {
                    ?>
                        <div class="mylib__content">
                            <div class="mylib__left">
                                <div class="mylib__img-wrapper">
                                    <img src="images/book-covers/hronici_narnii-1.jpg" alt="Тут должна быть картинка">
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
            
            
            <script>
            function mylib_click()
            {
                <?php
                    if(isset($_SESSION['user_id']))
                    {
                        echo 'var session_user=1;';
                    }
                    else
                    {
                        echo 'var session_user=0;';
                    }
                ?>
                if(session_user)
                {
                    location.assign("mylibrary.php");
                }
                else
                {
                    location.assign("login.php");
                }
            }
            </script>

            <div class="mylib__button">
                <a href="#" onclick="mylib_click()">Показать всё</a>
            </div>

        </div>

        <div class="block__comments">
            <h2 class="comments__top-title">
                Мои комментарии
            </h2>
            
            
            <?php
            for($i = 0; $i < 3; $i++)
            {
                ?>
                <div class="comments__wrapper">
                    <p class="comments__book">
                        <span>О книге: </span>Хроники Нарнии - Клайв Льюис
                    </p>

                    <p class="comments__date">
                        15 сентября 2021
                    </p>

                    <div class="comments__text">
                        <p>Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. Ну норм вроде книга. </p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <div class="exit__button">
            <p>Выйти</p>
        </div>
    </div>
</main>


<?php
include("src/footer.php");
?>