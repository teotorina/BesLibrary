<?php
session_start();

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
        <div class="mylib">
            <h2 class="mylib__top-title">
                Моя библиотека
            </h2>
            
            <?php

                include("src/connect.php");
                
                $mylib_request = "SELECT b.id, b.title, a.name, b.cover_link, b.description, pl.last_chapter
                                FROM book b
                                JOIN author a ON a.id = b.author_id
                                JOIN personal_library pl ON pl.book_id = b.id AND pl.user_id = {$_SESSION['user_id']};";

                $mylib_result = mysqli_query($connection, $mylib_request);

                if($mylib_result->num_rows == 0)
                {
                    echo "Вы не добавили ни одной книги в личную библиотеку";
                }

                $mylib_array = $mylib_result->fetch_all();

                ?>
                <script>
                    function book_info_click(temp_book_id)
                    {
                        location.assign(`book.php?book_id=${temp_book_id}`);
                    }
                </script>
                <?php

                for($i = 0; $i < $mylib_result->num_rows; $i++)
                {
                    ?>
                        <div class="mylib__content">
                            <div class="mylib__left">
                                <div class="mylib__img-wrapper">
                                    <img src="images/book-covers/<?php echo $mylib_array[$i][3] ?>" alt="Тут должна быть картинка">
                                </div>
                            
                                <div class="mylib__read">
                                <a href="book_reader.php?book_id=<?php echo $mylib_array[$i][0];?>&chapter=<?php if($mylib_array[$i][5] <= 0) echo '1'; else echo $mylib_array[$i][5];?>">Читать</a>
                                </div>
                            </div>
                            
                            <div class="mylib__right">
                                <h2 class="mylib__book-title" onclick="book_info_click(<?php echo $mylib_array[$i][0];?>)">
                                    <?php echo $mylib_array[$i][1] ?>
                                </h2>
                            
                                <a href="#" class="mylib__book-author">
                                    <?php echo $mylib_array[$i][2] ?>
                                </a>
                                
                                <h2 class="mylib__description">
                                    Описание:
                                </h2>
                            
                                <div class="mylib__description-text">
                                    <?php echo $mylib_array[$i][4] ?>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</main>

<?php
include("src/footer.php");
?>