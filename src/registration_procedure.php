<?php
session_start();

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
    include("connect.php");

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
        $regist_request = "INSERT INTO `user`(`nick`, `password`) VALUES ('{$nick}','{$pass1}')";
        $regist_result = mysqli_query($connection, $regist_request);


        $check1_request = "SELECT IF(COUNT(*) > 0, 'true', 'false')
                                FROM user
                                WHERE user.nick = '{$nick}';";

        $check2_request = "SELECT user.id
                            FROM user
                            WHERE user.nick = '{$nick}';";

        $check1_result = mysqli_query($connection, $check1_request);
        if($check1_result->num_rows == 0)
        {
            echo "Ошибка";
        }
        $check1_array = $check1_result->fetch_row();
        if ($check1_array[0] == 'false')
        {
            echo "Ошибка регистрации";
        }
        else
        {
            $check2_result = mysqli_query($connection, $check2_request);
            if($check2_result->num_rows == 0)
            {
                echo "Ошибка";
            }
            $check2_array = $check2_result->fetch_row();

            $_SESSION['user_id'] = $check2_array[0];
            
            header("location: /user_page.php");
        }
    }
}