<?php
$title = "Все жанры";
include("src/header.php");
?>


<div class="sidebar__wrapper">
    <?php
    include("src/menu.php");
    ?>
</div>

<?php
    include("connect.php");

    //запрос для получения информации о книге
    $genre_group_request = 
    "SELECT genre_group.name
    FROM genre_group";

    $group_result = mysqli_query($connection, $genre_group_request);

    if($group_result->num_rows == 0)
    {
        //ошибка
    }
    $group_array = $group_result->fetch_all();
?>

<main class="main">
    <?php
    for($i = 0; $i < $group_result->num_rows; $i++)
    {
        ?>
        <section class="genre__block">
            <h2 class="genre__title">
                <?php echo $group_array[$i][0] ?>
            </h2>

            <ul class="genre__list">
            <?php
                $genre_request = "SELECT genre.name AS name_genre FROM genre
                                    WHERE genre.genre_group_id = (SELECT genre_group.id FROM genre_group
                                                                    WHERE genre_group.name = '{$group_array[$i][0]}')";
                $genre_result = mysqli_query($connection, $genre_request);
                if($genre_result == false)
                {
                    die(mysqli_error($connection));
                }
                $genre_array = $genre_result->fetch_all();

                for($j = 0; $j < $genre_result->num_rows; $j++)
                {
                    ?>

                    <li><a href="#"><?php echo $genre_array[$j][0]; ?></a></li>

                    <?php
                }
            ?>        
            </ul>
        </section>

        <?php
    }

    ?>

</main>


<?php
include("src/footer.php");
?>