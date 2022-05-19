

<?php
    include("src/header.php");
?>


<div class="sidebar__wrapper">
    <?php
    include("src/menu.php");
    ?>
</div>

<main class="main">
    <div class="main__wrapper reader">
        <?php
            $book_id = 1;

            $connection = mysqli_connect('127.0.0.1', 'connection', '1', 'bes_library');

            $request = "SELECT title, number, text_link FROM chapter WHERE book_id = {$book_id}";

            $query_result = mysqli_query($connection, $request);
            $query_array = $query_result->fetch_row();
            
            $file_path = __DIR__ . '\\' . $query_array[2];

            $text = file_get_contents($file_path);

        ?>
        <div class="reader__block">
            <h1 class="reader__block-name"><?php echo $query_array[0]; ?></h1>

            <h2 class="reader__block-author">Дж.К.Роулинг</h2>

            <h2 class="reader__block-chapter">Глава 1. Мальчик, который выжил</h2>

            <?php echo $text; ?>

            <div class="reader__block-bottom">
                <div class="next__chapter">
                    <a href="#">Следующая глава</a>
                </div>
            </div>
        </div>
        
             
    </div>
</main>


<?php
    include("src/footer.php");
?>