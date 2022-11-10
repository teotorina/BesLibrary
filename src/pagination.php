<?php
$current_page = $_POST['current_page'] + 1;
session_start();
include("connect.php");
$items_on_page = 5;
$items_count_req = "SELECT count(*) from personal_library where user_id = {$_SESSION['user_id']};";
$items_count = mysqli_query($connection, $items_count_req)->fetch_all()[0][0] + 0;
//$total_pages = ceil($items_count/$items_on_page);
//var_dump($total_pages);
$offset = $current_page * $items_on_page;
$mylib_request = "SELECT b.id, b.title, a.name, b.cover_link, b.description, pl.last_chapter
                                FROM book b
                                JOIN author a ON a.id = b.author_id
                                JOIN personal_library pl ON pl.book_id = b.id AND pl.user_id = {$_SESSION['user_id']}
                                LIMIT 5 OFFSET {$offset}";

$mylib_result = mysqli_query($connection, $mylib_request);
//var_dump($mylib_result);
if ($mylib_result->num_rows == 0) {
    echo "Вы не добавили ни одной книги в личную библиотеку";
}

$mylib_array = $mylib_result->fetch_all();


for ($i = 0; $i < $mylib_result->num_rows; $i++) {
?>
    <div class="mylib__content">
        <div class="mylib__left">
            <div class="mylib__img-wrapper">
                <img src="images/book-covers/<?php echo $mylib_array[$i][3] ?>" alt="Тут должна быть картинка">
            </div>

            <a href="book_reader.php?book_id=<?php echo $mylib_array[$i][0]; ?>&chapter=<?php if ($mylib_array[$i][5] <= 0) echo '1';
                                                                                        else echo $mylib_array[$i][5]; ?>">
                <div class="mylib__read">
                    <p>Читать</p>
                </div>
            </a>

        </div>

        <div class="mylib__right">
            <h2 class="mylib__book-title" onclick="book_info_click(<?php echo $mylib_array[$i][0]; ?>)">
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