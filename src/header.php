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

                            <button class="header__notification-btn">
                                <img class="header__notification-img" src="images/icons/notification.svg" alt="Уведомления">
                            </button>


                            <script>
                            function test()
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
                                    location.assign("/user_page.php");
                                }
                                else
                                {
                                    location.assign("login.php");
                                }
                            }
                            </script>

                            <button class="header__user-btn" onclick="test()">
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