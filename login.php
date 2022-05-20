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
        <div class="block__login">
            <h1 class="block__login-h1">
                Вход в аккаунт
            </h1>

            <div class="login__wrapper">
                <form class="login__form" action="login_procedure.php" method="post">

                    <p>Введите имя:</p>

                    <input type="text" name="nick">

                    <p>Введите пароль:</p>

                    <input type="text" name="password">

                    <br>
                    <input class="form__buttom" type="submit" value="Войти в аккаунт">

                </form>
            </div>
        </div>

    </div>


</main>

<?php
include("src/footer.php");
?>