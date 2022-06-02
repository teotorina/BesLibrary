<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/lib/swiper.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="images/icon.png" type="image/png">
</head>

<body>
    <div class="body__wrapper">
        <header class="header">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <div class="header__wrapper">
                <div class="container">
                    <div class="header__inner">
                        <div class="header__logo">
                            <img class="header__logo-img" src="images/logo.svg" alt="Логотип">
                        </div>

                        <div class="header__content">
                            <div class="header__search-wrapper">
                                <form class="header__search-form" name="search_form">
                                    <input class="header__search" id="search" type="text" placeholder="Найти книгу">
                                </form>
                            </div>


                            <script>
                                var notific_activ = true;
                                console.log("Кнопка не нажата");
                                function time_click(){
                                    if(notific_activ)
                                    {
                                        let el = document.getElementById('notific__block');
                                        el.className = "notification__block-v";
                                        notific_activ = false;
                                        console.log("Кнопка нажата");
                                    }
                                    else
                                    {
                                        let el = document.getElementById('notific__block');
                                        el.className = "notification__block-h";
                                        notific_activ = true;
                                        console.log("Кнопка не нажата");
                                    }
                                }
                            </script>


                            <button class="header__notification-btn" onclick="time_click()">
                                <img class="header__notification-img" src="images/icons/notification.svg" alt="Уведомления">

                                <div class="notification__block-h" id ="notific__block">
                                    <h2 class="notification__block-title">
                                        Уведомления
                                    </h2>

                                    <ul class="notific__list">
                                        <li>
                                            <a href="time.php" class="notific__link">
                                                <div class="notific__item">
                                                    Скоро выйдет новая книга
                                                </div>
                                            </a>
                                        </li>
                                        <!-- <li>
                                            <div class="notific__item">
                                                Вторая новость
                                            </div>
                                        </li>
                                        <li>
                                            <div class="notific__item">
                                                Третья новость
                                            </div>
                                        </li>
                                        <li>
                                            <div class="notific__item">
                                                Четвертая новость
                                            </div>
                                        </li>
                                        <li>
                                            <div class="notific__item">
                                                Пятая новость
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>
                            </button>

                            <script>
                            function user_click()
                            {
                                <?php
                                    if(isset($_SESSION['user_id']))
                                    {
                                        echo 'let session_user=1;';
                                    }
                                    else
                                    {
                                        echo 'let session_user=0;';
                                    }
                                ?>

                                if(session_user)
                                {
                                    location.assign("user_page.php");
                                }
                                else
                                {
                                    location.assign("login.php");
                                }
                            }
                            </script>

                            <button class="header__user-btn" onclick="user_click()">
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