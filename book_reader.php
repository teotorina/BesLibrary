

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
            if (isset($_GET["book_id"]))
            {
                $book_id = $_GET["book_id"];
            }

            if (isset($_GET["chapter"]))
            {
                $chapter_num = $_GET["chapter"];
            }

            require "connect.php";

            $request = "SELECT book.title, chapter.title, chapter.number, chapter.text_link, author.name FROM chapter 
                        JOIN book ON book.id = chapter.book_id
                        JOIN author ON author.id = book.author_id
                        WHERE chapter.book_id = {$book_id} AND chapter.number = {$chapter_num};";

            $query_result = mysqli_query($connection, $request);
            if($query_result == false)
            {
                die(mysqli_error($connection));
            }
            $query_array = $query_result->fetch_row();

            $book_title = $query_array[0];
            $chapter_title = $query_array[1];
            $chapter_number = $query_array[2];
            $chapter_text_link = $query_array[3];
            $author_name = $query_array[4];
            
            $file_path = __DIR__ . '\\chapters\\' . $chapter_text_link;

            $text = file_get_contents($file_path);

        ?>
        <div class="reader__block">
            <h1 class="reader__block-name"><?php echo $chapter_title; ?></h1>

            <h2 class="reader__block-author"><?php echo $author_name; ?></h2>

            <h2 class="reader__block-chapter">Глава <?php echo $chapter_num; ?>. <?php echo $chapter_title; ?></h2>

            <?php echo $text; ?>

            <div class="reader__block-bottom">
                <?php 
                    $next_chapter = $chapter_num + 1;
                    $request = "SELECT * FROM chapter WHERE number = {$next_chapter} AND book_id = {$book_id}";
                    $query_result = mysqli_query($connection, $request);
                    $next_chapter_link = "#";
                    if($query_result->num_rows != 0)
                    {
                        $next_chapter_link = "book_reader.php?book_id=" . $book_id . "&chapter_num=" . $next_chapter;
                ?>
                <div class="next__chapter">
                    
                    <a href="<?php echo $next_chapter_link; ?>">Следующая глава</a>
                </div>
                <?php } ?>
            </div>
        </div>
        
             
    </div>
</main>


<?php
    include("src/footer.php");
?>