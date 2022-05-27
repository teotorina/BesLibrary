<?php

session_start();
include('connect.php');

// сначала на всякий проверка наличия пользователя

if(!isset($_SESSION['user_id'])) echo 'Войдите в аккаунт для отправки сообщения';
else
{
    $comment_book_id = $_POST['book_id'];
    $comment_text_before = $_POST['comment_text'];
    $comment_user = $_SESSION['user_id'];
    $comment_date = date("Y-m-d");
    
    $comment_text = '';

    foreach (explode("\n", $comment_text_before) as $comment_item)
    {
        $comment_text = $comment_text . '<p>' . $comment_item . "</p>";
    }

    echo $comment_book_id . ', ' . $comment_text . ', ' . $comment_user . ', ' . $comment_date;

    $request = "INSERT INTO comments (`text`, `date`, `book_id`, `user_id`)
                VALUES ('{$comment_text}', '{$comment_date}', {$comment_book_id}, {$comment_user})";
    $result = mysqli_query($connection, $request);


    $book_page = 'location: /book.php?book_id=' . $comment_book_id;

    header($book_page);
}