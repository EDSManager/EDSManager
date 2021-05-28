<?php
// SETUP PAGE

require_once ('../approot.inc.php');

echo 'Текущая версия PHP: ' . phpversion();
echo ' - ';

$ver = (float)phpversion();

if ($ver > 7.0) echo 'Ok'; elseif ($ver === 7.0) echo 'Ok';
else echo 'Error. Версия PHP не поддерживается';

echo "<br><br>";

if (file_exists(CONFIG_FILE)){

    echo "Файл конфигурации: ".CONFIG_FILE." уже создан.";}

    else {

    echo '<form action="save_config.php" method="post" enctype="multipart/form-data">';
    echo 'Имя сервера базы данных (db_host): <input type="text" name="db_host" value="localhost" /><br />';
    echo 'Имя базы данных (db_name): <input type="text" name="db_name" value="eds"/><br />';
    echo 'Имя пользователя базы данных (db_user): <input type="text" name="db_user" /><br />';
    echo 'Пароль пользователя базы данных (db_pwd): <input type="text" name="db_pwd" /><br />';
    echo "<br>";
    echo '<input type="submit" value="Сохранить" />';
    echo '</form>';
    };

echo "<br>";

include_once ('./mysql_connect.php');

?>
