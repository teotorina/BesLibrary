<?php

$nick = $_POST['nick'];
$pass = $_POST['password'];

if (trim($nick) == '' || trim($pass) == '')
{
    echo "Введены не все данные";
}
else {
    include("../connect.php");

    //получаем пароль для данного логина, если ответ пустой - такого пользователя не существует, если не подходит пароль - неверный пароль
    $lodin_request = "SELECT user.password FROM user WHERE user.nick = '{$nick}';";

    $login_result = mysqli_query($connection, $lodin_request);

    if($login_result->num_rows == 0)
    {
        echo "Такого пользователя не существует";
    }
    else
    {
        $login_array = $login_result->fetch_row();
        // var_dump($login_array);

        if($pass != $login_array[0])
        {
            echo "Пароль не верен";
            echo $pass . ', ' . $login_array[0];
        }
        else
        {
            echo "Верный пароль";
        }
    }
}


