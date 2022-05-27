<?php
session_start();
include("src/connect.php");

$book_id = $_GET["book_id"];

// Добавление просмотров на книгу, при загрузки страницы
$view_request = "UPDATE `book` SET book.view_count = book.view_count + 1 WHERE book.id = {$book_id};";
$view_result = mysqli_query($connection, $view_request);

//запрос для получения информации о книге
$book_info_request =
    "SELECT book.title, author.name, book.cover_link, series.name, book.num_in_series, book.description, 
            book.release_date, book.view_count
    FROM book
    JOIN author ON book.author_id = author.id
    JOIN series ON book.series_id = series.id
    WHERE book.id = {$book_id};";

$query_result = mysqli_query($connection, $book_info_request);

if ($query_result->num_rows == 0) {
    //ошибка
}
$query_array = $query_result->fetch_row();
//парсинг запроса
$book_title = $query_array[0];
$author_name = $query_array[1];
$book_cover_link = $query_array[2];
$series_name = $query_array[3];
$book_series_num = $query_array[4];
$book_description = $query_array[5];
$book_release_date = $query_array[6];
$view_count = $query_array[7];

$genres_request =
    "SELECT genre.name FROM book_has_genre
    JOIN genre ON genre.id = book_has_genre.genre_id
    WHERE book_has_genre.book_id = {$book_id};";

$genres_query = mysqli_query($connection, $genres_request);
$genres_array = $genres_query->fetch_all();
?>

<?php
$title = $book_title;
include("src/header.php");
?>


<div class="sidebar__wrapper">
    <?php
    include("src/menu.php");
    ?>
</div>


<main class="main">
    <div class="main__wrapper">
        <div class="book__top">
            <div class="book__left">
                <div class="book__img-wrapper">
                    <img class="book__img" src="images/book-covers/<?php echo $book_cover_link; ?>" alt="Тут должна быть картинка">
                </div>

                <a href="book_reader.php?book_id=<?php echo $book_id; ?>&chapter=1">
                    <div class="book__read">
                        <p>Читать</p>
                    </div>
                </a>

                <?php
                if (isset($_SESSION['user_id'])) {
                    $check_request = "SELECT IF(COUNT(*) > 0, 'true', 'false')
                                            FROM personal_library pl
                                            WHERE pl.user_id = {$_SESSION['user_id']} AND pl.book_id = {$book_id};";

                    $check_result = mysqli_query($connection, $check_request);

                    if ($check_result->num_rows == 0) {
                        echo "Ошибка";
                    }

                    $check_array = $check_result->fetch_row();

                    if ($check_array[0] == 'true') {
                        $add_check = true;
                    } else {
                        $add_check = false;
                    }
                } else {
                    $add_check = false;
                }
                ?>

                <div class="<? echo $add_check? "book__remove" : "book__add";?>" id="book__add-button" >
                    <p><?php if ($add_check) echo 'Добавлено';
                        else echo 'Добавить к себе'; ?></p>
                </div>

                <script>
                    var is_added = <? echo $add_check? '1;' : '0;'; ?>
                   
                    $(document).ready(function() {
                        $('#book__add-button').on('click', function() {
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                echo 'let session_user=1;';
                            } else {
                                echo 'let session_user=0;';
                            }
                            ?>
                            if (!session_user) {
                                location.assign("login.php");
                            } else {
                                $.ajax({
                                    method: "POST",
                                    url: 'src/add_mylib.php',
                                    data: {
                                            param: is_added, book: <? echo $book_id ?>
                                        },
                                    success: function(response) {
                                        console.log(response);
                                        if (response == "Данные удалены")
                                        {
                                            let el = document.getElementById('book__add-button')
                                            el.className = "book__add";
                                            el.children[0].innerText = "Добавить к себе"
                                            is_added = 0;
                                        }
                                        else
                                        {
                                            let el = document.getElementById('book__add-button')
                                            el.className = "book__remove";
                                            el.children[0].innerText = "Добавлено"
                                            is_added = 1;
                                        }
                                    },
                                    error: function(response) {
                                        console.log(response);
                                    }
                                });
                            }

                        })
                    });
                </script>
            </div>

            <div class="book__right">
                <!-- Название книги, автор, жанры, год или дата публикации, серия (при наличии), количество просмотров и количество читающих-->
                <h1 class="book__title">
                    <?php echo $book_title; ?>
                </h1>

                <a class="book__author" href="#">
                    <?php echo $author_name; ?>
                </a>

                <?php
                $genres_string = $genres_array[0][0];
                for ($i = 1; $i < $genres_query->num_rows; $i++) {
                    $genres_string = $genres_string . ', ' . $genres_array[$i][0];
                }
                ?>

                <p class="book__info">
                    <span>Жанры:</span> <?php echo $genres_string; ?>
                </p>

                <p class="book__info">
                    <span>Серия:</span> <?php echo $series_name ?> (<?php echo $book_series_num; ?> часть)
                </p>

                <p class="book__info">
                    <span>Год издания:</span> <?php echo idate('Y', $book_release_date) ?>
                </p>

                <p class="book__info">
                    <span>Просмотров:</span> <?php echo $view_count; ?>
                </p>

                <p class="book__info">
                    <span>Добавлений: </span>
                    <?php
                    $add_request = "SELECT COUNT(*) FROM personal_library
                                        GROUP BY personal_library.book_id
                                        HAVING personal_library.book_id = {$book_id};";

                    $add_result = mysqli_query($connection, $add_request);
                    if ($add_result->num_rows == 0) {
                        echo 0;
                    }
                    $add_array = $add_result->fetch_row();
                    echo $add_array[0];
                    ?>
                </p>
            </div>
        </div>

        <div class="book__description">
            <h2 class="description">
                Описание
            </h2>

            <div class="description__text">
                <?php echo $book_description; ?>
            </div>
        </div>

        <div class="book__content">
            <!-- Заколовок "Содержание" разворачивается и внизу номера глав и их названия (названия не обязательно), и по названиям можно перейти к конкретной главе -->
            <h2 class="content">
                Содержание
            </h2>

            <ol class="content__list">
                <?php
                $chapters_request =
                    "SELECT number, title, id FROM chapter
                    WHERE book_id = {$book_id};";
                $chapters_query = mysqli_query($connection, $chapters_request);
                $chapters_array = $chapters_query->fetch_all();

                for ($i = 0; $i < $chapters_query->num_rows; $i++) {
                    $chapter_name = $chapters_array[$i][1];
                    $number = $chapters_array[$i][0];
                    $chapter_id = $chapters_array[$i][2];
                ?>
                    <li class="content__item">
                        <a href="book_reader.php?book_id=<?php echo $book_id; ?>&chapter=<?php echo $chapter_id; ?>"><span>Глава <?php echo $number; ?>.</span> <?php echo $chapter_name; ?></a>
                    </li>
                <?php } ?>
            </ol>
        </div>

        <div class="book__comments">

            <h2 class="comment__add-title">
                Написать комментарий
            </h2>

            <!-- Поле для текста, кнопка для отправки -->

            <form action="src/comment_procedure.php"  method="POST">
                <input type="text" hidden name="book_id" value="<?php echo $book_id; ?>">
                <textarea class="comment__add-text" name="comment_text" id=""></textarea>
                <input class="comment__add" type="submit" placeholder="Отправить">
            </form>

            <h2 class="book__comments-title">
                Комментарии
            </h2>

            <!-- Имя пользователя, дата написания, текст комментария -->
            <?php
            $comments_request = "SELECT u.nick, c.date, c.text
                                FROM comments c
                                JOIN user u ON u.id = c.user_id
                                WHERE c.book_id = {$book_id};";

            $comments_resutl = mysqli_query($connection, $comments_request);
            if ($comments_resutl->num_rows == 0) {
                echo 'Комментариев нет';
            }

            $comments_array = $comments_resutl->fetch_all();

            for ($i = 0; $i < $comments_resutl->num_rows; $i++) {
            ?>

                <div class="book__comments-wrapper">
                    <p class="book__comments-name">
                        <?php echo $comments_array[$i][0]; ?>
                    </p>
                    <p class="book__comments-date">
                        <?php echo date('d.m.Y', strtotime($comments_array[$i][1])); ?>
                    </p>
                    <div class="book__comments-text">
                        <?php echo $comments_array[$i][2] ?>
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