<?php
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
        <div class="block__regist">

            <ul class="login__regist">
                <li class="login__regist-item"><a href="login.php">Войти</a></li>
                <li class="login__regist-item active"><a href="registration.php">Зарегистрироваться</a></li>
            </ul>

            <div class="regist__wrapper">
                <form class="regist__form" action="registration_procedure.php" method="post">
                    <p>Введите имя:</p>

                    <input type="text" name="nick">

                    <p>Введите пароль:</p>

                    <input type="password" name="password">

                    <p>Введите пароль повторно:</p>

                    <input type="password" name="password_repetition">

                    <br>
                    <input class="form__buttom" type="submit" value="Зарегистрироваться">
                </form>
            </div>
        </div>

    </div>


</main>

<?php
include("src/footer.php");
?>