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
            <h1 class="block__regist-h1">
                Регистрация аккаунта
            </h1>

            <div class="regist__wrapper">
                <form class="regist__form" action="registration_procedure.php" method="post">
                    <p>Введите имя:</p>

                    <input type="text" name="nick">

                    <p>Введите пароль:</p>

                    <input type="text" name="password">

                    <p>Введите пароль повторно:</p>

                    <input type="text" name="password_repetition">

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