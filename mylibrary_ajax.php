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
                $items_on_page = 5;
                $items_count_req = "SELECT count(*) from personal_library where user_id = {$_SESSION['user_id']};";
                $items_count = mysqli_query($connection, $items_count_req)->fetch_all()[0][0] + 0;
                $total_pages = ceil($items_count/$items_on_page);
                //var_dump($total_pages);
                $offset = $current_page * $items_on_page;
                $mylib_request = "SELECT b.id, b.title, a.name, b.cover_link, b.description, pl.last_chapter
                                FROM book b
                                JOIN author a ON a.id = b.author_id
                                JOIN personal_library pl ON pl.book_id = b.id AND pl.user_id = {$_SESSION['user_id']}
                                LIMIT 5";

                $mylib_result = mysqli_query($connection, $mylib_request);
                //var_dump($mylib_result);
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

                                <a href="book_reader.php?book_id=<?php echo $mylib_array[$i][0];?>&chapter=<?php if($mylib_array[$i][5] <= 0) echo '1'; else echo $mylib_array[$i][5];?>">
                                    <div class="mylib__read">
                                        <p>Читать</p>
                                    </div>
                                </a>
                                
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
        <div> 
                <button id="ajax_load"> >Загрузить еще</button>
            </div>
    </div>
</main>

<form id="plain_form" method="post" enctype="multipart/form-data"></form>

<script>
    window.onload = () => {
        bindEvents()
    }

    const total_pages = <?= $total_pages - 1?>;
    var currentPage = 0;
    var useFetch = false;

    function bindEvents() {
        if(useFetch)
            document.getElementById('ajax_load').onclick = () => loadMoreFetch();
        else
            document.getElementById('ajax_load').onclick = () => loadMore();
    }

    async function loadMoreFetch() {
        const form = document.getElementById('plain_form')
        const mainContainer = document.getElementsByClassName('mylib')[0]
        let fd = new FormData(form)
        fd.append('current_page', currentPage);
        const response = await fetch('/src/pagination.php', {
            method: "POST",
            body: fd
        });
        let element = document.createElement('template')
        element.innerHTML = await response.text();
        console.log(element)
        mainContainer.appendChild(element.content)
        currentPage += 1;
        if(currentPage == total_pages)
            document.getElementById('ajax_load').setAttribute('hidden', '');
    }

    function loadMore(){
        let request = new XMLHttpRequest()
        const form = document.getElementById('plain_form')
        const mainContainer = document.getElementsByClassName('mylib')[0]
        let fd = new FormData(form)
        fd.append('current_page', currentPage);
        request.open("POST", "/src/pagination.php");
        request.send(fd);
        request.onloadend = () => {
            let element = document.createElement('template')
            element.innerHTML = request.response;
            console.log(element)
            mainContainer.appendChild(element.content)
        }
        currentPage += 1;
        if(currentPage == total_pages)
            document.getElementById('ajax_load').setAttribute('hidden', '');
    }

</script>

<?php
include("src/footer.php");
?>