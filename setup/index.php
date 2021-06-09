<?php
// SETUP PAGE

require_once ('../approot.inc.php');

echo "<!DOCTYPE html>";
echo '<html lang="ru">';
echo "<head><title>Настройка EDSManager</title>";
echo '<meta charset="utf-8">';
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
echo '<link rel="stylesheet" href="../css/style.css">';
echo "</head>";

echo "<body>";

echo 'Текущая версия PHP: ' . phpversion();

$ver = (float)phpversion();

if ($ver > 5.6) echo ' - Ok'; 
else {
    echo ' - Error. Версия PHP не поддерживается';
    die();
};

echo "<br>";

if (file_exists(CONFIG_FILE)){

    echo "Файл конфигурации: ".CONFIG_FILE." - OK.<br>";

} else {

        if (!is_dir(APPCONF)) {

            echo "Создаем каталог: ". APPCONF;
            if (!mkdir(APPCONF)) {
                die('Не удалось создать каталог:'. APPCONF);
            }

        }

    echo '<section class="container">';

    echo '<div id="headerInner">';
    echo '<div class="logo">';
    echo '<a href="/">EDS Manager</a>';
    echo '  </div>';
    echo '</div>';

    echo '<div class="config">';

    echo '<h2>Настройка доступа к базе данных</h2>';
    echo '<form action="save_config.php" method="post" enctype="multipart/form-data" class = "new_form1">';
    echo '<table><tbody>';
    echo '<tr>';
    echo '<td>Имя сервера базы данных (db_host):</td>';
    echo '<td><input size=40 type="text" name="db_host" title="Имя сервера базы данных (db_host)" value="localhost" placeholder="Имя сервера базы данных (db_host)" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Имя базы данных (db_name):</td>';
    echo '<td><input size=40 type="text" name="db_name" title= "Имя базы данных (db_name)" value="eds" placeholder="Имя базы данных (db_name)" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Имя пользователя базы данных (db_user):</td>';
    echo '<td><input size=40 type="text" name="db_user" title= "Имя пользователя базы данных (db_user)" placeholder="Имя (db_user)"/></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Пароль пользователя базы данных (db_pwd):</td>';
    echo '<td><input size=40 type="text" name="db_pwd" title="Пароль пользователя базы данных (db_pwd)" placeholder="Пароль (db_pwd)" /></td>';
    echo '</tr>';
    echo '</tbody></table>';
    echo '<p></p>';
    echo '<input type="submit" value="Сохранить" />';
    echo '</form>';
    };

echo '</body>';
echo '</html>';

