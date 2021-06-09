
<?php

if (isset ($_SESSION["userid"])) {

    echo '<!-- начало colMenu -->';
    echo '<div id="colMenu">';
    echo '<div class="text">';
    echo '<h1>Главное Меню</h1>';
    echo '</div>';
    echo '<div class="colMenu">';
    echo '<p><a href="#">ссылка 1</a> </p>';
    echo '<p><a href="#">ссылка 2</a> </p>';
    echo '<p><a href="../setup/mysql_db_update.php">Обновить БД</a></p>';
    echo '<p><a href="admin.php">Инструменты администратора</a> </p>';
    echo '<p><a href="logoff.php">Выход</a> </p>';
    echo '</div>';
    echo '</div>';
    echo '<!-- конец colMenu -->';

} else {

    header("Location: ../");

};
