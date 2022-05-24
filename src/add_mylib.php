<?php
include("connect.php");
session_start();

// treu - надо удалить, false - надо добавить
$delete = $_POST['param'];
$book = $_POST['book'];

if ($delete) {
    $delete_request = "DELETE FROM personal_library
                        WHERE personal_library.book_id = '{$book}' AND personal_library.user_id = '{$_SESSION['user_id']}';";

    $delete_result = mysqli_query($connection, $delete_request);

    echo "Данные удалены";
}
else {
    $add_request = "INSERT INTO personal_library (`book_id`, `user_id`)
                        VALUES ({$book}, {$_SESSION['user_id']});";

    $add_result = mysqli_query($connection, $add_request);

    echo "Данные добавлены";
}
