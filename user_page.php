<?php
    session_start();

    $title = "Страница пользователя";
    include("src/header.php");
?>

<div class="sidebar__wrapper">
    <?php
    include("src/menu.php");
    ?>
</div>

<main class="main">
    <div class="main__wrapper">
        <div class="block__nick">
            <h2 class="nick">
                <?php

                    include("src/connect.php");
                    
                    $nick_request = "SELECT nick FROM user WHERE id = {$_SESSION['user_id']};";

                    $nick_result = mysqli_query($connection, $nick_request);

                    if($nick_result->num_rows == 0)
                    {
                        echo "Ошибка";
                    }
                
                    $nick_array = $nick_result->fetch_row();

                    echo $nick_array[0];
                ?>
            </h2>

        </div>

        <div class="block__mylib">
            <h2 class="mylib__top-title">
                Моя библиотека
            </h2>
            
            <div class="mylib__wrapper">
                <?php

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

                for($i = 0; $i < 3 && $i < $mylib_result->num_rows; $i++)
                {
                    ?>
                        <div class="mylib__content">
                            <div class="mylib__left">
                                <div class="mylib__img-wrapper">
                                    <img src="images/book-covers/<?php echo $mylib_array[$i][3] ?>" alt="Тут должна быть картинка">
                                </div>
                            
                                <div class="mylib__read">
                                    <a href="book_reader.php?book_id=<?php echo $mylib_array[$i][0];?>&
                                    chapter=<?php if($mylib_array[$i][5] <= 0) echo '1'; else echo $mylib_array[$i][5];?>">Читать</a>
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
            
            
            <script>
            function mylib_click()
            {
                <?php
                    if(isset($_SESSION['user_id']))
                    {
                        echo 'var session_user=1;';
                    }
                    else
                    {
                        echo 'var session_user=0;';
                    }
                ?>
                if(session_user)
                {
                    location.assign("mylibrary.php");
                }
                else
                {
                    location.assign("login.php");
                }
            }
            </script>

            <div class="mylib__button" <?php if($mylib_result->num_rows == 0) echo "hidden"; ?>>
                <a href="#" onclick="mylib_click()">Показать всё</a>
            </div>

        </div>

        <div class="block__comments">
            <h2 class="comments__top-title">
                Мои комментарии
            </h2>
            
            
            <?php

            // Получить айди книги (для ссылки), название книги, имя автора, дата написания комментария, текст комментария
            $comments_request = "SELECT b.id, b.title, a.name, c.date, c.text
                                FROM comments c
                                JOIN book b ON b.id = c.book_id
                                JOIN author a ON a.id = b.author_id
                                WHERE c.user_id = {$_SESSION['user_id']};";

            $comments_result = mysqli_query($connection, $comments_request);

            if($comments_result->num_rows == 0)
            {
                echo "Вы не оставили ни одного комментария";
            }

            $comments_array = $comments_result->fetch_all();

            for($i = 0; $i < $comments_result->num_rows; $i++)
            {
                ?>
                <div class="comments__wrapper">
                    <p class="comments__book">
                        <span>О книге: </span><a href="book.php?book_id=<?php echo $comments_array[$i][0]; ?>"><?php echo $comments_array[$i][1]; ?></a> &mdash; <?php echo $comments_array[$i][2]; ?>
                    </p>

                    <p class="comments__date">
                        <?php echo date('d.m.Y', strtotime($comments_array[$i][3])); ?>
                    </p>

                    <div class="comments__text">
                        <?php echo $comments_array[$i][4]; ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <a href="src/exit.php">
            <div class="exit__button">
                <p>Выйти</p>
            </div>
        </a>
        
    </div>
</main>


<?php
include("src/footer.php");
?>