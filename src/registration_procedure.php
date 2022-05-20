<?php

$nick = trim($_POST['nick']);
$pass1 = $_POST['password'];
$pass2 = $_POST['password_repetition'];

if ($nick == '' || $pass1 == '' || $pass2 == '')
{
    echo "Введены не все данные";
}
elseif (strlen($nick) < 3)
{
    echo "Не корректное имя";
}
elseif ($pass1 != $pass2 || strlen($pass1) < 4 || strlen($pass1) > 20)
{
    echo "Не корректно введен пароль";
}
else
{
    include("../connect.php");

    //получаем пароль для данного логина, если ответ пустой - такого пользователя не существует, если не подходит пароль - неверный пароль
    $info_request = "SELECT IF(COUNT(*) > 0, 'true', 'false') FROM user WHERE user.nick = '{$nick}';";

    $info_result = mysqli_query($connection, $info_request);

    if($info_result->num_rows == 0)
    {
        echo "Ошибка";
    }

    $info_array = $info_result->fetch_row();

    if($info_array[0] == 'true')
    {
        echo "Пользователь с таким ником уже есть";
    }
    else
    {
        // Здесь надо зарегать
    }
}