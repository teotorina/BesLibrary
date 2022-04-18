<div class="sidebar">
    <nav class="sidebar__menu">
        <ul class="sidebar__menu-list">
            <li class="sidebar__menu-item book">
                <a class="sidebar__menu-link <?php if ($_SERVER['REQUEST_URI'] == '/') echo "active"; ?>" href="/">
                    Книги
                </a>
            </li>
            <li class="sidebar__menu-item star">
                <a class="sidebar__menu-link" href="#">
                    Интересное
                </a>
            </li>
            <li class="sidebar__menu-item library">
                <a class="sidebar__menu-link" href="#">
                    Моя библиотека
                </a>
            </li>
        </ul>

        <ul class="sidebar__menu-list">
            <li class="sidebar__menu-item">
                <a class="sidebar__menu-link" href="#">
                    Жанры
                </a>
            </li>
            <li class="sidebar__menu-item">
                <a class="sidebar__menu-link" href="#">
                    Авторы
                </a>
            </li>
            <li class="sidebar__menu-item">
                <a class="sidebar__menu-link <?php if ($_SERVER['REQUEST_URI'] == "/book_series.php") echo "active"; ?>" href="book_series.php">
                    Серии
                </a>
            </li>
        </ul>
    </nav>
</div>