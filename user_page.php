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

<?php
echo $_SESSION['user_id'];
?>
</main>


<?php
include("src/footer.php");
?>